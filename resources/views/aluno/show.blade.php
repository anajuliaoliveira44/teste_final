@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
    <h1>Dados do aluno</h1>
    <p>Matricula: {{ $aluno->matricula }}</p>
    <p>Nome: {{ $aluno->nome }}</p>
    <p>Email: {{ $aluno->email }}</p>
    <p>Data de nascimento: {{ $aluno->data_nascimento }}</p>
    <img src="{{ asset($aluno->foto)}}" alt="" srcset="max-width: 400px;">
     <p>Telefone: {{ $aluno->contatoAluno->telefone }}</p>
@endsection