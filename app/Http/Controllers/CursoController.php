<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        $curso_inf = Curso::where('nome', '!=', 'informática')->get();
        $curso_tip = Curso::where('nome', 'Administração')->orWhere('nome','Gestão')->get();

        return view('curso.index', compact('cursos', 'curso_inf', 'curso_tip'));
    }

   
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Curso::create([
            'nome' => $request->nome
        ]);
        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::find($id);
        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::find($id);
        return view('curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Curso::find($id)->update([
            'nome' => $request->nome
        ]);
        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->route('curso.index');
    }
}
