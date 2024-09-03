@extends('layouts.app')

@section('title', 'Editar Veículo')

@section('content')

    <style>
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
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
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

        .back-button {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            text-align: center;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>

    <div class="container">
        <div class="header">

        </div>

        <h3>Editar Veículo</h3>

        <form action="{{ route('veiculos.update', $veiculo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $veiculo->nome) }}" required>
            </div>

            <div>
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $veiculo->modelo) }}" required>
            </div>

            <div>
                <label for="placa">Placa:</label>
                <input type="text" id="placa" name="placa" value="{{ old('placa', $veiculo->placa) }}" required>
            </div>

            <div>
                <label for="renavam">RENAVAM:</label>
                <input type="text" id="renavam" name="renavam" value="{{ old('renavam', $veiculo->renavam) }}" required>
            </div>

            <div>
                <label for="user_id">Usuário:</label>
                <select id="user_id" name="user_id" required>
                    <option value="">Selecione um usuário</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $veiculo->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="observacao">Observação:</label>
                <textarea id="observacao" name="observacao">{{ old('observacao', $veiculo->observacao) }}</textarea>
            </div>

            <button type="submit">Salvar</button>
            <a href="{{ route('veiculos.index') }}" class="back-button">Voltar</a>
        </form>
    </div>

@endsection
