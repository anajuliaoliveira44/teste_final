<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

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
                    <img src="{{ Auth::user()->foto}}" alt="" class="w-24 h-24 rounded-full mb-4 object-cover">

                    <h2 class="text-xl font-bold text-[#000000]">{{ Auth::user()->name }}</h2>
                    @endauth
                    @guest
                    <img src="imagens/logo/logo_sabor_do_brasil.png" class="w-24 h-24 rounded-full mb-4 object-cover">

                    <h2 class="text-xl font-bold text-[#000000]">Sabor do Brasil</h2>
                    @endguest

                    <hr class="mb-4 border-3 border-[#D97014] w-3/4">

                    <div class="flex flex-col items-center gap-2 mt-2">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold">{{ $total_likes ?? 0 }}</span>
                            <span class="text-sm text-gray-600">likes totais</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold">{{ $total_dislikes ?? 0 }}</span>
                            <span class="text-sm text-gray-600">dislikes totais</span>
                        </div>
                    </div>

                </div>
            </div>
=======
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

>>>>>>> b30999b3e9210094af1c03a54f6c305538de201d
            <div class="p-6 bg-gray-100 col-span-2">
                <main>
                    @yield('content')
                </main>
            </div>

<<<<<<< HEAD
            <div class="flex flex-col items-center justify-between p-6 bg-gray-100 border">
                @guest
                <button command="show-modal" commandfor="dialog" class="rounded-md bg-[#D97014] font-bold text-[#FFFFFF] px-20 py-2 text-sm inset-ring inset-ring-white/5">
    Entrar
</button>
@endguest
                @auth
                <div class="flex flex-col items-center gap-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-md bg-[#D97014] px-4 py-2 text-white font-bold">Sair</button>
                    </form>
                </div>
                @endauth
                <el-dialog>
                    <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                        <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-center shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                <div class="bg-white px-2 pt-3 pb-4">
                                    <div class="">

                                        <div class="mt-3 text-center">
                                            <h1 id="dialog-title" class="text-base font-semibold text-black">Login</h1>
                                            <div class="mt-2 px-4">
                                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf


                                                    <div>
                                                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Digite seu email" />
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>


                                                    <div class="mt-4">
                                                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha" />

                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>

                                                    <div class="py-3 sm:flex sm:flex-row-reverse">
                                                        <button type="submit" class="inline-flex w-full justify-center rounded-md border bg-[#d97014] px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Entrar</button>

                                                        <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md border border-[#d97014] px-3 py-2 text-sm font-semibold text-black inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </el-dialog-panel>
                        </div>
                    </dialog>
                </el-dialog>

            </div>

        </div>
    </div>
    <footer class="bg-[#d97014] text-[#FFFFFF] justify-items-center px-8 py-8">
        <div class="container grid grid-cols-3">

            <div class="mb-4 text-left">
                <p class="text-2xl font-bold text-[#FFFFFF]">Sabor do Brasil</p>
            </div>

            <div class="flex justify-center pt-1.5 gap-20">
                <a href="">
                    <img src="imagens\icones\Instagram.svg" alt="Facebook" class="h-7 w-7">
                </a>
                <a href="">
                    <img src="imagens\icones\Twitter.svg" alt="Facebook" class="h-7 w-7">
                </a>
                <a href="">
                    <img src="imagens\icones\Whatsapp.svg" alt="Facebook" class="h-7 w-7">
                </a>
                <a href="">
                    <img src="imagens\icones\Globe.svg" alt="Facebook" class="h-7 w-7">
                </a>
            </div>

            <div class="mb-4 text-right">
                <p class="text-2xl font-bold text-[#FFFFFF]">Copyright - 2024</p>
            </div>

        </div>
    </footer>
</body>

</html>
=======
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
>>>>>>> b30999b3e9210094af1c03a54f6c305538de201d
