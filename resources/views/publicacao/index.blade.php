@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100">
    <header>
        <h1 class="text-4xl font-bold text-center">Publicações</h1>
    </header>

    <div class="mt-6 grid gap-6">
        @forelse($publicacoes as $publicacao)
            <div class="border rounded-lg p-4 shadow-sm">
                <h2 class="text-lg font-bold mb-2">{{ $publicacao->titulo_prato }}</h2>

                <div class="mb-3">
                    <img src="{{ asset($publicacao->foto) }}" class="w-full h-auto rounded">
                </div>

                <div class="grid grid-cols-3 gap-4 text-sm text-gray-700">
                    <div>{{ $publicacao->localr ?? '-' }}</div>
                    <div>{{ $publicacao->cidade ?? '-' }}</div>
                    <div class="flex items-center gap-4">
                      
                    </div>
                </div>

                <div class="mt-3 flex gap-3">
                    <form action="{{ route('like') }}" method="POST">
                        @csrf
                        <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                        <button type="submit" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-[#D97014] text-white"> 
                            <img src="{{ asset('imagens/icones/flecha_cima_vazia.svg') }}" alt="Like" class="w-5 h-5">
                            
                        </button>
                    </form>

                    <form action="{{ route('dislike') }}" method="POST">
                        @csrf
                        <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                        <button type="submit" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-gray-200 text-gray-800"> 
                            <img src="{{ asset('imagens/icones/flecha_baixo_vazia.svg') }}" alt="Dislike" class="w-5 h-5">
                           
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600">Nenhuma publicação encontrada.</p>
        @endforelse
    </div>
</div>
@endsection