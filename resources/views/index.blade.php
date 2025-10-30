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
       
    </div>
</div>
@endforeach
@endsection