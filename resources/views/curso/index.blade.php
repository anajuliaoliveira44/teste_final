@extends('layout.app')
@section('title', 'Dados do aluno')
@section('content')
<h1>Nome do curso</h1>
<table class="table">
    <thead class="thead-dark">
        <th>Nome</th>
    </thead>
    <tbody>
        @foreach($cursos as $curso)
        <tr class="table-responsive-xl">
            <td>{{ $curso->nome}}</td>
            <td><a href="{{ route('curso.edit',$curso->id)}}" class="btn btn-success">Editar</a>
                <a href="{{ route('curso.show',$curso->id)}}" class="btn btn-primary">Visualizar</a>
                <form action="{{route('curso.destroy',$curso->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>

            @endforeach

        </tr>
    </tbody>
</table>

 <h2>cursos cujo nome seja diferente </h2>
@foreach($curso_inf as $curso)
<P>{{$curso->nome}}</P>
@endforeach

<h2> cursos com nome igual a "Administração" ou "Gestão" </h2>
@foreach($curso_tip as $curso)
<P>{{$curso->nome}}</P>
@endforeach

@endsection