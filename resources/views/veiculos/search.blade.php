
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Resultados da Pesquisa</h1>


    <form action="{{ route('veiculos.search') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Buscar por modelo" value="{{ request()->input('modelo') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" name="placa" id="placa" class="form-control" placeholder="Buscar por placa" value="{{ request()->input('placa') }}">
            </div>
            <div class="col-md-4 d-flex align-items-end mb-3">
                <button class="btn btn-primary w-100" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    @if(isset($veiculos) && !$veiculos->isEmpty())
        <div class="row">
            @foreach ($veiculos as $veiculo)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $veiculo->modelo }}</h5>
                            <p class="card-text">Placa: <strong>{{ $veiculo->placa }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif(isset($veiculos))
        <p class="text-center">Nenhum veículo encontrado.</p>
    @endif
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    h1 {
        font-size: 2.5rem;
        color: #333;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 0.375rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.125);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 0.375rem;
        font-size: 1.125rem;
        padding: 0.75rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 0.375rem;
    }

    .card-body {
        padding: 1.25rem;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 0.75rem;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }
</style>
@endsection
