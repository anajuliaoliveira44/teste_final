<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('aluno', AlunoController::class);
    Route::get('contato/aluno', [AlunoController::class, 'contato']);
    Route::resource('professor', ProfessorController::class);
    Route::resource('curso', CursoController::class);
    Route::resource('turma', TurmaController::class);
});



require __DIR__ . '/auth.php';
