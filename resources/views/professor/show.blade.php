@extends('layout.app')
@section('title', 'Dados do professor')
@section('content')
    <h1>Dados do professor</h1>
    <p>Nome: {{ $professor->nome}}</p>
    <p>Disciplina: {{ $professor->disciplina}}</p>
    <p>Email: {{ $professor->contatoProfessor?->email}}</p>
    <p>Telefone: {{ $professor->contatoProfessor?->telefone}}</p>
    <img src="{{ asset($professor->foto)}}" alt="" srcset="max-width: 400px;">
@endsection