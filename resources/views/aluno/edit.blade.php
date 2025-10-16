@extends('layout.app')
@section('title', 'Editar do aluno')
@section('content')
<h1>Editar aluno</h1>
<form action="{{route("aluno.update" , $aluno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Matrícula</label>
    <input type="text" name="matricula" id="matricula" value="{{ $aluno->matricula }}">
    <label for="">Nome</label>
    <input type="text" name="nome" id="nome" value="{{ $aluno->nome }}">
    <label for="">Email</label>
    <input type="text" name="email" id="email" value="{{ $aluno->email }}">
    <label for="">Data de nascimento</label>
    <input type="date" name="data_nascimento" id="data" value="{{ $aluno->data_nascimento }}">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" name="foto" id="foto">
    <div class="col">
        <label for="" class="form-label">Turma:</label>
        <select name="turma_id" id="turma" class="form-label">
            <option value="">Selecione</option>
            @foreach($turmas as $turma)
            <option value="{{ $turma->id}}">{{ $turma->descricao}}</option>
            @endforeach
        </select>
    </div>
    <img src="{{ asset($aluno->foto)}}" alt="" srcset="max-width: 400px;">
    <label for="">Telefone:</label>
    <input type="text" name="telefone" id="telefone" value="{{ $aluno->contatoAluno->telefone }}">

    <button type="submit">Salvar</button>
</form>

@endsection