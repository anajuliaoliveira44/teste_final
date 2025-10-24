<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function publicacao()
    {
        return view('publicacao.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }
}