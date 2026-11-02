<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\AgendamentoController; // ADICIONE ESTA LINHA
use App\Http\Controllers\EmprestimoController;  // ADICIONE ESTA LINHA
use App\Http\Controllers\RelatorioController; // <-- O 'use' fica AQUI em cima!
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('equipamentos', EquipamentoController::class);
    Route::resource('manutencoes', ManutencaoController::class);
    Route::get('/relatorios/inventario', [RelatorioController::class, 'inventario'])->name('relatorios.inventario');
      // Rotas de Empréstimos (Adicione estas):
    Route::resource('emprestimos', EmprestimoController::class);
    Route::patch('/emprestimos/{emprestimo}/devolver', [EmprestimoController::class, 'devolver'])->name('emprestimos.devolver');
    
    Route::get('/relatorios/inventario', [RelatorioController::class, 'inventario'])->name('relatorios.inventario');
});

require __DIR__.'/auth.php';