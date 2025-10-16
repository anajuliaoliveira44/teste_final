@extends('layout.app')
@section('title', 'Pagina do aluno')
@section('content')

<table class="table">
    <thead class="thead-dark">
        <thead>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de nascimento</th>
        </thead>
    <tbody>
        @foreach ($alunos as $aluno)
        <tr>
            <td>{{$aluno->matricula }}</td>
            <td>{{$aluno->nome }}</td>
            <td>{{$aluno->email }}</td>
            <td>{{$aluno->data_nascimento }}</td>
            <td><a href="{{ route('aluno.edit',$aluno->id)}}" class="btn btn-success">Editar</a>
            <td><a href="{{ route('aluno.show',$aluno->id)}}" class="btn btn-primary">Visualizar</a>

                <form action="{{ route('aluno.destroy',$aluno->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<h3>data de nascimento:</h3>
@foreach($aluno_lolo as $aluno)
<p>{{ $aluno->nome }}</p>
@endforeach

<h2>Nome Silva</h2>
@foreach($aluno_sil as $aluno)
<P>{{$aluno->nome}}</P>
@endforeach

<h2>data de nascimento anterior</h2>
@foreach($aluno_dat as $aluno)
<P>{{$aluno->nome}}</P>
@endforeach

<h2>alunos cuja data de nascimento esteja entre "2004-01-01" e "2006-12-31"</h2>
@foreach($aluno_ap as $aluno)
<P>{{$aluno->nome}}</P>
@endforeach

<h2> alunos que nasceram após "2005-01-01"</h2>
@foreach($aluno_dat as $aluno)
<P>{{$aluno->nome}}</P>
@endforeach


@endsection