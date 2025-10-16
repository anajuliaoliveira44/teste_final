@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Curso escolhido</h1>

<p>Nome: {{ $curso->nome }}</p>


@endsection