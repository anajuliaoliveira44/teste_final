<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{
     public function like(Request $request)
    {

        $request->validate([
            'publicacao_id' => 'required|integer|exists:publicacao,id',
        ]);

        $publicacaoId = $request->input('publicacao_id');

        // Procura pela avaliação da publicação; se não existir, cria com valores iniciais
        $avaliacao = Avaliacao::firstOrCreate(
            ['publicacao_id' => $publicacaoId],
            ['likes' => 0, 'deslikes' => 0]
        );

        // Incrementa de forma segura o contador de likes
        $avaliacao->increment('likes');

        return redirect()->back()->with('success', 'Avaliação registrada (like)');
    }

    public function dislike(Request $request)
    {
        $request->validate([
            'publicacao_id' => 'required|integer|exists:publicacao,id',
        ]);

        $publicacaoId = $request->input('publicacao_id');

        // Procura pela avaliação da publicação; se não existir, cria com valores iniciais
        $avaliacao = Avaliacao::firstOrCreate(
            ['publicacao_id' => $publicacaoId],
            ['likes' => 0, 'deslikes' => 0]
        );

        // Incrementa de forma segura o contador de deslikes
        $avaliacao->increment('deslikes');

        return redirect()->back()->with('success', 'Avaliação registrada (dislike)');
    }
}
