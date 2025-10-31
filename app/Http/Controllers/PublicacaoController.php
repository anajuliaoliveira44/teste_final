<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\Avaliacao;
use App\Models\Comentario;
use App\Models\Like;
use App\Models\Dislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacaoController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with(['comentario.user'])->get();
        $total_likes = Like::count();
        $total_dislikes = Dislike::count();
        foreach ($publicacoes as $publicacao) {
            $publicacao->likes_count = Like::where('publicacao_id', $publicacao->id_publicacao)->count();
            $publicacao->deslikes_count = Dislike::where('publicacao_id', $publicacao->id_publicacao)->count();


            $publicacao->user_liked = Auth::check() ?
                Like::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;

            $publicacao->user_disliked = Auth::check() ?
                Dislike::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;

            $publicacao->user_liked = Auth::check() ?
                Like::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;

            $publicacao->user_disliked = Auth::check() ?
                Dislike::where('publicacao_id', $publicacao->id_publicacao)
                ->where('user_id', Auth::id())
                ->exists() : false;
        }

        $user_likes_count = 0;
        $user_dislikes_count = 0;

        if (Auth::check()) {
            $user_likes_count = Like::where('user_id', Auth::id())->count();
            $user_dislikes_count = Dislike::where('user_id', Auth::id())->count();
        }

        return view('index', compact('publicacoes', 'total_likes', 'total_dislikes', 'user_likes_count', 'user_dislikes_count'));
    }

    public function like($id_publicacao)
    {
        $publicacao = Publicacao::where('id_publicacao', $id_publicacao)->firstOrFail();
        $publicacao = Publicacao::findOrFail($id_publicacao);
        $user = Auth::user();
        $likeExistente = Like::where('publicacao_id', $id_publicacao)
        ->where('user_id', $user->id)
        ->first();

    if ($likeExistente) {
        $likeExistente->delete();
    } else {
        // Remove dislike se existir
        Dislike::where('publicacao_id', $id_publicacao)
            ->where('user_id', $user->id)
            ->delete();
            
        Like::create([
            'publicacao_id' => $id_publicacao,
            'user_id' => $user->id,
            'likes' => 1
        ]);
    }

    return redirect()->back();
}

    public function dislike($id_publicacao)
    {
        $publicacao = Publicacao::findOrFail($id_publicacao);
        $publicacao = Publicacao::where('id_publicacao', $id_publicacao)->firstOrFail();
        $user = Auth::user();
       $deslikeExistente = Dislike::where('publicacao_id', $id_publicacao)
        ->where('user_id', $user->id)
        ->first();

    if ($deslikeExistente) {
        $deslikeExistente->delete();
    } else {
            
        Dislike::create([
            'publicacao_id' => $id_publicacao,
            'user_id' => $user->id,
            'dislikes' => 1
        ]);
    }

    return redirect()->back();
}

    public function comentario(Request $request, Publicacao $publicacao)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        Comentario::create([
            'publicacao_id' => $publicacao->id_publicacao,
            'user_id' => Auth::id(),
            'comentario' => $request->comentario,
        ]);
        return redirect()->back();
    }
}
