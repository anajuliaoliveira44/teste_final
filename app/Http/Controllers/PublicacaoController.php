<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\Avaliacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function index()
    {
        // eager load da avaliacao para evitar N+1 e garantir disponibilidade em view
        $publicacoes = Publicacao::with('avaliacao')->get();
        return view('publicacao.index', compact('publicacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listarPublicacoes()
    {
        $avaliacao = Avaliacao::find(1);
        return view('publicacao.index', compact('avaliacao'));
    }
}
