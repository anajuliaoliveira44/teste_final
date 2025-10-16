@extends('layout.app')
@section('title', 'Editar curso')
@section('content')
<h1>Editar curso</h1>
<form action="{{route("curso.update" , $curso->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="">Nome</label>
    <input type="text" name="nome" id="nome" value="{{ $curso->nome }}">
    <div class="col">
        <button type="submit" class="btn btn-primary mb-2">Salvar</button>
    </div>
</form>
@endsection