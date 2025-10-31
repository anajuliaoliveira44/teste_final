@extends('layouts.app')
@section('content')
<div class="text-center border border-[#C2BEBE] border-black ">
    <header>
        <h1 class="text-4xl font-bold ">
            Publicações
        </h1>
    </header>
</div>
@foreach($publicacoes as $publicacao)
<div class="border">

    <h2 class="text-lg font-bold">{{$publicacao->titulo_prato}}</h2>
    <div class="border border-black rounded p-4 mx-1">
        <p class="max-w-full h-auto mx-auto">
            <img src="{{asset($publicacao->foto)}}" class="w-full h-auto rounded">
        </p>
    </div>
    <div class="mt-2 grid grid-cols-2 grid-rows-2 px-1">
        <p>{{$publicacao->localr}}</p>
        <p>{{$publicacao->cidade}}</p>
        <div class="inline-flex items-center">

            <form action="{{ route('publicacoes.like', $publicacao->id_publicacao) }}" method="POST">
            @csrf
            <button type="submit">
            <img src="{{  asset('imagens/icones/' . ($publicacao->user_liked ? 'flecha_cima_cheia.svg' : 'flecha_cima_vazia.svg')) }}" class="w-6 h-6">
            </button>
            </form>
            <span>{{ $publicacao->likes_count}} likes</span>

            <form action="{{ route('publicacoes.dislike', $publicacao->id_publicacao) }}" method="POST">
                @csrf
                <button type="submit"
                    @auth
                    onclick="this.form.submit()"
                    @endauth
                    @guest
                    command="show-modal" commandfor="dialog"
                    @endguest>
                    <img src="{{ asset('imagens/icones/' . ($publicacao->user_disliked ? 'flecha_baixo_cheia.svg' : 'flecha_baixo_vazia.svg')) }}" class="w-6 h-6">
                </button>
            </form>
            <span>{{ $publicacao->deslikes_count}} deslikes</span>
        </div>
        <div class="inline-flex items-center mt-2">
            <button @click="open = !open">
                <img src="{{ asset('imagens/icones/chat.svg') }}" class="w-6 h-6">
            </button>
            <span>{{ $publicacao->comentario->count() }}</span>
        </div>

        @auth
            <strong class="font-semibold mb-1">{{Auth::user()->nome}}:</strong>
            <form action="{{ route('publicacoes.comentar', $publicacao->id_publicacao) }}" method="POST" class="flex gap-2">
                @csrf
                <input type="text" name="comentario" placeholder="Escreva um comentário..." class="border rounded p-1 flex-1" required>
                <button type="submit" class="bg-blue-500 text-white px-3 rounded">Comentar</button>
            </form>
        @endauth
        @if($publicacao->comentario && $publicacao->comentario->count() > 0)
        @foreach($publicacao->comentario as $comentario)
        <div class="border-t pt-2">
            <strong class="font-semibold">{{ $comentario->user->nome ?? 'Usuário' }}:</strong>
            <p>{{ $comentario->comentario }}</p>
            <small class="text-gray-500">{{ $comentario->created_at ? $comentario->created_at->format('d/m/Y H:i') : 'Agora' }}</small>
        </div>
        @endforeach
        @endif





    </div>
    @endforeach
    @endsection