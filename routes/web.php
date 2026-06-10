<?php

use Illuminate\Support\Facades\Route;
use App\Models\Aluno;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\LivroController;


Route::get('/', function () {
    return view('index');
})->name('raiz');

# ROTAS DE ALUNO ==================================================================================
Route::get('/aluno',                [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create',         [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno',               [AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/{id}/view',      [AlunoController::class, 'view'])->name('aluno.view');
Route::post('/aluno/{id}/update',   [AlunoController::class, 'update'])->name('aluno.update');
Route::get('/aluno/{id}/destroy',   [AlunoController::class, 'destroy'])->name('aluno.destroy');
Route::get('/aluno/search',         [AlunoController::class, 'search'])->name('aluno.search');

# ROTAS DE LIVRO ==================================================================================
Route::get('/livro',                [LivroController::class, 'index'])->name('livro.index');
Route::get('/livro/create',         [LivroController::class, 'create'])->name('livro.create');
Route::post('/livro',               [LivroController::class, 'store'])->name('livro.store');
Route::get('/livro/{id}/view',      [LivroController::class, 'view'])->name('livro.view');
Route::post('/livro/{id}/update',   [LivroController::class, 'update'])->name('livro.update');
Route::get('/livro/{id}/destroy',   [LivroController::class, 'destroy'])->name('livro.destroy');
Route::get('/livro/search',         [LivroController::class, 'search'])->name('livro.search');

# ROTAS DE TELEFONE ===============================================================================
Route::get('/telefone',                [TelefoneController::class, 'index'])->name('telefone.index');
Route::get('/telefone/create',         [TelefoneController::class, 'create'])->name('telefone.create');
Route::post('/telefone',               [TelefoneController::class, 'store'])->name('telefone.store');
Route::get('/telefone/{id}/view',      [TelefoneController::class, 'view'])->name('telefone.view');
Route::post('/telefone/{id}/update',   [TelefoneController::class, 'update'])->name('telefone.update');
Route::get('/telefone/{id}/destroy',   [TelefoneController::class, 'destroy'])->name('telefone.destroy');
Route::get('/telefone/search',         [TelefoneController::class, 'search'])->name('telefone.search');

# ROTAS DE EMPRÉSTIMO =============================================================================
Route::get('/emprestimo',           [EmprestimoController::class, 'index'])->name('emprestimo.index');
Route::post('/emprestimo/{id}/devolver', [EmprestimoController::class, 'devolver'])->name('emprestimo.devolver');
Route::get('/emprestimo/create',         [EmprestimoController::class, 'create'])->name('emprestimo.create');
Route::post('/emprestimo',               [EmprestimoController::class, 'store'])->name('emprestimo.store');
Route::get('/emprestimo/{id}/view',      [EmprestimoController::class, 'view'])->name('emprestimo.view');
Route::get('/emprestimo/{id}/destroy',   [EmprestimoController::class, 'destroy'])->name('emprestimo.destroy');
Route::get('/emprestimo/search',         [EmprestimoController::class, 'search'])->name('emprestimo.search');
