<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ativo;
use App\Http\Controllers\AtivoController;

Route::get('/', function () {
    return view('welcome');
});

// Rota para exibir todos os ativos no dashboard e configurar filtros
Route::get('/ativo', [AtivoController::class, 'index'])->middleware('auth');

// Rota para exibir o formulário de cadastro de um novo ativo
Route::get('/cadastro', [AtivoController::class, 'create']);

// Rota para cadastrar um novo ativo no banco de dados
Route::post('/cadastrar-ativo', [AtivoController::class, 'store']);

// Rota para exibir os detalhes de um ativo específico
Route::get('/endereco/{id}', [AtivoController::class, 'show']);

// Rota para exibir o formulário de edição de um ativo específico
Route::get('/ativo/{id}/editar', [AtivoController::class, 'edit']);

// Rota para atualizar os dados de um ativo existente
Route::put('/ativo/{id}', [AtivoController::class, 'update']);

// Rota para excluir um ativo do banco de dados
Route::delete('/ativo/{id}', [AtivoController::class, 'destroy']);

// Grupo de rotas protegidas por autenticação
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Rota para exibir o dashboard (necessita de autenticação)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
