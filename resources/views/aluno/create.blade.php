@extends('layout.app')
@section('title', 'Cadastro do aluno')
@section('content')
    <h1>Cadastro de aluno</h1>
    <form action="{{route("aluno.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Matrícula</label>
        <input type="text" name="matricula" id="matricula">
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome">
        <label for="">Email</label>
        <input type="text" name="email" id="email">
        <label for="">Data de nascimento</label>
        <input type="date" name="data_nascimento" id="data">

        <div class="row mb-3">
         <div class="col -mb-6">
         <label for="foto"  class="form-label">Foto</label>
         <input type="file" name="foto" id="foto">
         </div>
        </div>

        <br>
        <div class="col">
         <label for="" class="form-label">Turma:</label>
         <select name="turma_id" id="turma" class="form-label">
            <option value="">Selecione</option>
            @foreach($turmas as $turma)
            <option value="{{ $turma->id}}">{{ $turma->descricao}}</option>
            @endforeach
         </select>
        </div>

        <div class="col">
         <label for="">Telefone:</label>
         <input type="text" class="form-control" placeholder="Seu email" name="telefone" id="telefone">
        </div>
        <button type="submit">Salvar</button>
    </form>

@endsection