@extends('layout.app')
@section('title', 'Editar do professor')
@section('content')
    <h1>Editar professor</h1>
    <form action="{{ route("professor.update",$professor->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $professor->nome }}">
        <label for="">Disciplina</label>
        <input type="text" name="disciplina" id="disciplina" value="{{ $professor->disciplina }}">
         <label for="">Email</label>
        <input type="text" name="email" id="email" value="{{ $professor->contatoProfessor?->email }}">
         <label for="">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ $professor->contatoProfessor?->telefone }}">
        <label for="foto"  class="form-label">Foto</label>
         <input type="file" name="foto" id="foto">
          <img src="{{ asset($professor->foto)}}" alt="" srcset="max-width: 400px;">
        <button type="submit">Salvar</button>
    </form>
@endsection