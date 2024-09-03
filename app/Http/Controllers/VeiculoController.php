<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class VeiculoController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = $request->input('query');

        if ($user->isAdmin()) {
            if ($query) {
                $veiculos = Veiculo::where('modelo', 'LIKE', "%{$query}%")
                    ->orWhere('placa', 'LIKE', "%{$query}%")
                    ->get();
            } else {
                $veiculos = Veiculo::all();
            }
        } else {
            if ($query) {
                $veiculos = Veiculo::where('user_id', $user->id)
                    ->where(function ($queryBuilder) use ($query) {
                        $queryBuilder->where('modelo', 'LIKE', "%{$query}%")
                            ->orWhere('placa', 'LIKE', "%{$query}%");
                    })
                    ->get();
            } else {
                $veiculos = Veiculo::where('user_id', $user->id)->get();
            }
        }

        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        $this->authorize('create', Veiculo::class);

        $users = User::all();
        return view('veiculos.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Veiculo::class);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'renavam' => 'required|string|max:20',
            'user_id' => 'required|exists:users,id',
            'observacao' => 'nullable|string',
        ]);

        Veiculo::create($validatedData);

        return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $this->authorize('update', $veiculo);

        $users = User::all();
        return view('veiculos.edit', compact('veiculo', 'users'));
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $this->authorize('update', $veiculo);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'renavam' => 'required|string|max:20',
            'user_id' => 'required|exists:users,id',
            'observacao' => 'nullable|string',
        ]);

        $veiculo->update($validatedData);

        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $this->authorize('delete', $veiculo);

        $veiculo->delete();

        return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso.');
    }
}
