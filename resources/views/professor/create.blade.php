@extends('layout.app')
@section('title', 'Cadastro de Professor')
@section('content')
     <h1>Cadastro de Professor</h1>
    <form action="{{route("professor.store") }}" method="post" enctype="multipart/form-data">
      @csrf 
      <label for="">Nome</label>  
      <input type="text" name="nome" id="nome">
      <label for="">Disciplina</label> 
      <input type="text" name="disciplina" id="disciplina">
      <label for="">Email</label>
      <input type="text" name="email" id="email">
      <label for="">Telefone</label>
      <input type="text" name="telefone" id="telefone">

      <div class="row mb-3">
         <div class="col -mb-6">
         <label for="foto"  class="form-label">Foto</label>
         <input type="file" name="foto" id="foto">
         </div>
        </div>
      <button type="submit">Salvar</button>
    </form>
@endsection