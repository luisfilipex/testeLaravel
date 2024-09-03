@extends('layouts.app')

@section('title', 'Veículos Cadastrados')

@section('content')

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1400px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .header a:hover {
            background-color: #0056b3;
        }

        form {
            display: flex;
            margin-bottom: 20px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        th.actions-header {
            padding-left: 20px;
        }

        td.actions-column {
            padding-left: 20px;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons a, .action-buttons button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            text-align: center;
        }

        .action-buttons a:hover, .action-buttons button:hover {
            background-color: #0056b3;
        }

        .back-button {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>

    <div class="container">
        <h3>Veículos Cadastrados</h3><br><br>
        <form action="{{ route('veiculos.index') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar por modelo ou placa" value="{{ request()->query('query') }}">
            <button type="submit">Buscar</button>
        </form>

        <a href="{{ url('/dashboard') }}" class="back-button">Voltar</a>

        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>RENAVAM</th>
                    <th>Usuário</th>
                    <th>Observação</th>
                    <th class="actions-header">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->nome }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->renavam }}</td>
                        <td>{{ $veiculo->user->name }}</td>
                        <td>{{ $veiculo->observacao }}</td>
                        <td class="actions-column action-buttons">
                            @if(Auth::check() && Auth::user()->isAdmin())
                                <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="edit-button">Editar</a>
                                <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Nenhum veículo encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
