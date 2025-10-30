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
    Route::post('/like', [AvaliacaoController::class, 'like'])->name('like');
    Route::post('/dislike', [AvaliacaoController::class, 'dislike'])->name('dislike');
});

Route::resource('index', PublicacaoController::class);
// Endpoint público para buscar a foto do usuário por email (usado no formulário de login)
Route::get('/user/photo', function(Request $request) {
    $email = $request->query('email');
    if (!$email) return response()->json(['foto' => null]);
    $user = User::where('email', $email)->first();
    if (!$user) return response()->json(['foto' => null]);
    // se o usuário tem uma foto salva, retorna asset; caso contrário, retorna Gravatar baseado no email
    if ($user->foto) {
        $foto = asset($user->foto);
    } else {
        $hash = md5(strtolower(trim($user->email)));
        $foto = 'https://www.gravatar.com/avatar/'.$hash.'?s=200&d=identicon';
    }
    return response()->json(['foto' => $foto]);
})->name('user.photo');
require __DIR__ . '/auth.php';
