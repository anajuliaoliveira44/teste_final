<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacaoController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AvaliacaoController;

Route::get('/', [PublicacaoController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('empresa', EmpresaController::class);
     Route::post('/publicacoes/{id_publicacao}/Like', [PublicacaoController::class, 'like'])->name('publicacoes.like');
    Route::post('/publicacoes/{id_publicacao}/Dislike', [PublicacaoController::class, 'dislike'])->name('publicacoes.dislike');
    Route::post('/publicacoes/{id_publicacao}/Comentario', [PublicacaoController::class, 'comentario'])->name('publicacoes.comentar');;
});
Route::get('/publicacoes', [PublicacaoController::class, 'index'])->name('publicacoes.index');
Route::resource('index', PublicacaoController::class);
require __DIR__ . '/auth.php';