@extends('layout.app')
@section('title', 'Dados da turma')
@section('content')
<h1>Dados da turma</h1>
<table class="table">
    <thead class="thead-dark">
        <th>Descrição</th>
    </thead>
    <tbody>
        @foreach($turmas as $turma)
        <tr class="table-responsive-xl">
            <td>{{ $turma->descricao}}</td>
            <td>{{ $turma->curso->nome}}</td>
            <td><a href="{{ route('turma.edit',$turma->id)}}" class="btn btn-success">Editar</a>
                <a href="{{ route('turma.show',$turma->id)}}" class="btn btn-primary">Visualizar</a>
                <form action="{{route('turma.destroy',$turma->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>

            @endforeach

        </tr>
    </tbody>
</table>

<h2>turmas com id maior que 10.  </h2>
@foreach($turma_maior as $turma)
<P>{{$turma->nome}}</P>
@endforeach

<h2> turmas estão cadastradas no sistema.  </h2>
@foreach($turma_cadas as $turma)
<P>{{$turma->nome}}</P>
@endforeach

@endsection