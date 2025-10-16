@extends('layout.app')
@section('title', 'Pagina do professor')
@section('content')
    <h1>Lista do Professor</h1>
    <table>
        <thead>
            <th>Nome</th>
            <th>disciplina</th>
        </thead>
        <tbody>
            @foreach($professores as $professor)
            <tr>
                <td>{{ $professor->nome}}</td>
                <td>{{ $professor->disciplina}} </td>
                    <td><a href="{{ route('professor.edit',$professor->id)}}">Editar</a>
                    <a href="{{ route('professor.show',$professor->id)}}">Visualizar</a>
                
                <form action="{{ route('professor.destroy',$professor->id) }}" method="post" >
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>

    <h2> professores com nome começando</h2>
@foreach($professor_nomes as $professor)
<P>{{$professor->nome}}</P>
@endforeach

@endsection