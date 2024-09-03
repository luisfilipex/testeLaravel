@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                Seja bem-vindo, {{ Auth::user()->name }}!

                    <nav class="mt-4">
                        <ul class="space-y-2">
                            @if(Auth::check())
                                @if(Auth::user()->isAdmin())
                                    <li>
                                        <a href="{{ route('veiculos.create') }}" class="btn">Cadastrar Veículo</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('veiculos.index') }}" class="btn">Visualizar Veículos Cadastrados</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        @media (max-width: 640px) {
            .btn {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
@endpush
