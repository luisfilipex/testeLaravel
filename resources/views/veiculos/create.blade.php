@extends('layouts.app')

@section('title', 'Cadastrar Veículo')

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
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
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
        <h3>Cadastrar Novo Veículo</h3>
        <form action="{{ route('veiculos.store') }}" method="POST">
            @csrf
            <div>
                <label for="nome">Marca:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div>
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" required>
            </div>
            <div>
                <label for="placa">Placa:</label>
                <input type="text" id="placa" name="placa" value="{{ old('placa') }}" required>
            </div>
            <div>
                <label for="renavam">RENAVAM:</label>
                <input type="text" id="renavam" name="renavam" value="{{ old('renavam') }}" required>
            </div>
            <div>
                <label for="user_id">Usuário:</label>
                <select id="user_id" name="user_id" required>
                    <option value="">Selecione um usuário</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="observacao">Observação:</label>
                <textarea id="observacao" name="observacao">{{ old('observacao') }}</textarea>
            </div>
            <button type="submit">Salvar</button>
            <a href="{{ url('/dashboard') }}" class="back-button">Voltar</a>
        </form>
    </div>
@endsection
