<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\ContatoAluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        $aluno_lolo = Aluno::where('data_nascimento','2005-05-10')->get();
        $aluno_sil = Aluno::where ('nome','like', '%Silva%')->get();
        $aluno_dat = Aluno::whereDate('data_nascimento', '<', '2006-01-01')->get(); 
        $aluno_cuj = Aluno::whereDate('data_nascimento', '>', '2004-01-01' )->where('data_nascimento','<','2006-12-31')->get(); 
        $aluno_ap = Aluno::whereDate('data_nascimento', '<', '2005-01-01')->where('email','like','%gmail.com')->get();

        return view('aluno.index', compact('alunos', 'aluno_lolo', 'aluno_sil', 'aluno_dat', 'aluno_cuj', 'aluno_ap'));
    }

    public function contato()
    {
        return view('aluno.contato');
    }

    public function create()
    {
        $turmas = Turma::all();
        return view('aluno.create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(), PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo . '-' . time() . '-' . $extensao_arquivo;
        $request->foto->move(public_path('imagens'), $foto);


        $aluno = Aluno::create([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/' . $foto
        ]);
        $aluno->turmas()->attach($request->id_turma);

        $aluno->contatoAluno()->create([
            'telefone' => $request->telefone        ]);

        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = Aluno::find($id);
        return view('aluno.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        $turmas = Turma::all();
        return view('aluno.edit', compact('aluno', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foto = null;
        if ($request->hasFile('foto')){
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(), PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo . '-' . time() . '-' . $extensao_arquivo;

        $request->foto->move(public_path('imagens'), $foto);
        }
        $aluno = Aluno::find($id)->update([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/' . $foto
        ]);

        $aluno->turmas()->syncWithouDetaching($request->id_turma);
        $aluno->contatoAluno()->update([
            'telefone' => $request->telefone
        ]);

        return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        $id_contato_aluno =$aluno->contatoAluno->id;
        $contato_aluno = ContatoAluno::find($id_contato_aluno);
        $contato_aluno->delete();
        $aluno->delete();
        return redirect()->route('aluno.index');
    }
}
