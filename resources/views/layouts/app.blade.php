<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex-grow container-none mx-auto border">
        <div class="grid grid-cols-4 w-full ">
            <div class="p-6 border">
                <div class="flex flex-col items-center">
                    @auth
                       <img src="{{ Auth::user()->foto }}" class="w-24 h-24 rounded-full mb-4 object-cover">
                    <h2 class="text-xl">{{ Auth::user()->nome }}</h2>
                    @endauth

                    @guest
                        <img src="imagens/logo/logo_sabor_do_brasil.png" class="w-24 h-24 rounded-full mb-4 object-cover">
                        <h2 class="text-xl">Sabor do Brasil</h2>
                        <hr class="mb-4 border-3 border-[#D97014] w-3/4">
                    @endguest


                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-700">Total Likes: <span class="font-bold">{{ $totalLikes ?? 0 }}</span></p>
                        <p class="text-sm text-gray-700">Total Dislikes: <span class="font-bold">{{ $totalDeslikes ?? 0 }}</span></p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-100 col-span-2">
                <main>
                    @yield('content')
                </main>
            </div>

            <div class="p-6 bg-gray-100 border">
            
                @auth
                    <div class="flex flex-col items-center gap-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-md bg-[#D97014] px-4 py-2 text-white font-bold">Sair</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="flex flex-col items-center gap-4">
                        <img id="login-user-photo" src="{{ asset('imagens/logo/logo_sabor_do_brasil.png') }}" class="w-24 h-24 rounded-full mb-2 object-cover" alt="Foto do usuário" />
                        <button id="login-toggle" class="rounded-md bg-[#D97014] px-4 py-2 text-white font-bold">Entrar</button>

                        <form id="login-form" method="POST" action="{{ route('login') }}" class="mt-2 w-full max-w-xs hidden">
                            @csrf
                            <div class="mb-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input id="email" name="email" type="email" required class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-[#D97014] focus:ring-[#D97014]" />
                                @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-2">
                                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                                <input id="password" name="password" type="password" required class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-[#D97014] focus:ring-[#D97014]" />
                                @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center gap-2 px-3 py-1 rounded bg-[#D97014] text-white">Entrar</button>
                            </div>
                        </form>
                    </div>
                @endguest
            </div>


        </div>

    </div>
   
</body>
</html>

<script>
   
    (function(){
        const btn = document.getElementById('login-toggle');
        const form = document.getElementById('login-form');
        if(!btn || !form) return;
        btn.addEventListener('click', function(e){
            e.preventDefault();
            form.classList.toggle('hidden');
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });

            // Atualizar foto do usuário ao digitar/alterar o email
            const emailInput = document.getElementById('email');
            const userPhoto = document.getElementById('login-user-photo');
            let debounceTimer;
            if(emailInput && userPhoto){
                const fetchPhoto = (email) => {
                    if(!email) {
                        userPhoto.src = '{{ asset('imagens/logo/logo_sabor_do_brasil.png') }}';
                        return;
                    }
                    fetch('/user/photo?email=' + encodeURIComponent(email))
                        .then(r => r.json())
                        .then(data => {
                            if(data && data.foto){
                                userPhoto.src = data.foto;
                            }
                        }).catch(e => console.error(e));
                };

                emailInput.addEventListener('input', function(e){
                    clearTimeout(debounceTimer);
                    const value = e.target.value.trim();
                    debounceTimer = setTimeout(() => fetchPhoto(value), 400);
                });
            }
        })();
</script>