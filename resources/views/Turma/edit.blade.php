@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Editar turma</h1>
<form action="{{route("turma.update" , $turma->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="descrição">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira a descrição">
    <label for="nome">Cursos:</label>
    <select name="curso_id" id="curso_id">
        <option value="{{ $turma->curso_id}}" selected>{{$turma->curso->nome}}</option>
        @foreach($cursos as $curso)
        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
        @endforeach
    </select>
    <button type="submit">Salvar</button>
</form>
@endsection