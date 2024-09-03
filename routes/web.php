<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');


    Route::get('/veiculos/search', [VeiculoController::class, 'search'])->name('veiculos.search');


    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/veiculos/create', [VeiculoController::class, 'create'])->name('veiculos.create');
        Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
        Route::get('/veiculos/{veiculo}/edit', [VeiculoController::class, 'edit'])->name('veiculos.edit');
        Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
        Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
    });
});

require __DIR__.'/auth.php';
