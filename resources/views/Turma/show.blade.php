@extends('layout.app')
@section('title', 'Dados da turma')
@section('content')
<h1>Dados da turma</h1>

<p>Descrição: {{ $turma->descrição }}</p>


@endsection