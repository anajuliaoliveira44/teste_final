<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="flex-grow container-none mx-auto px-12 py-8">
        <div class="grid grid-cols-4 w-full ">
            <div class="p-6">
                <div class="flex flex-col items-center">
                    @auth
                    <img src="{{ Auth::user()->foto }}" class="w-24 h-24 rounded-full mb-4 object-cover">
                    <h2 class="text-xl">{{ Auth::user()->nome }}</h2>
                    @endauth

                    @guest
                    <img src="public/imagens/logo/logo_sabor_do_brasil (1).png" class="w-24 h-24 rounded-full mb-4 object-cover">
                    <h2 class="text-xl">Sabor do Brasil</h2>
                    <hr class="mb-4 border-3 border-[#D97014] w-3/4">
                    @endguest
                </div>
            </div>

            <div class="p-6 bg-gray-100 col-span-2">
                <h3>Coluna 2</h3>
                <main>
                    @yield('content')
                </main>
            </div>

            <div class="p-6 bg-gray-100">
                <h3>Coluna 3</h3>
            </div>


        </div>

    </div>
   
</body>
</html>