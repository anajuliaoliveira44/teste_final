@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Cadastro de turma</h1>
<form action="{{route("turma.store") }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="descricao">Descrição:</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="insira uma descrição">
        <label for="nome">Cursos:</label>
        <select name="curso_id" id="curso_id">
            <option value="">Selecione</option>
            @foreach($cursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
        </select>



    <br>
    <div class="col">
        <button type="submit" class="btn btn-primary mb-2">Salvar</button>
    </div>
    

</form>
@endsection