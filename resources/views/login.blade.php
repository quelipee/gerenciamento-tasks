<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Day's</title>
    @vite('resources/css/app.css')
</head>
<body class="w-screen h-screen flex items-center justify-center bg-white">
<div>
    <div class="container max-w-5xl px-auto px-4 py-20 h-full">
        <div class="flex flex-col-reverse lg:flex-row">

            <div class="lg:pr-10">
                <div>
                    <img src="{{ asset('img/tasks.png') }}" style="height: 500px; width: 500px;" alt="">
                </div>
            </div>

            <div class="ml-auto">
                <div>
                    <form enctype="multipart/form-data" action="{{route('login')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="w-96 h-full">
                            <div class="bg-gray-200 space-y-6 rounded-md border border-gray-300 shadow-md p-6">
                                <h2 class="text-center text-4xl mb-4 font-extrabold text-transparent
                                bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">TASKS DAY'S</h2>
                                <div>
                                    <label for="email" class="block text-md
                text-gray-800 mb-1">E-mail</label>
                                    <input placeholder="Digite seu E-mail" type="text" name="email" id="email"
                                           class="w-full bg-gray-50 text-sm border border-gray-300 rounded
                focus:border-blue-500 px-3 py-2 focus:outline-none text-gray-800
                placeholder-gray-300 transition duration-200 ease-in-out focus:ring-2
                focus:ring-blue-500 focus:ring-opacity-20" required>
                                </div>

                                <div>
                                    <label for="password" class="block text-md
                text-gray-800 mb-1">password</label>
                                    <input placeholder="Digite sua senha" type="password" name="password" id="password"
                                           class="w-full bg-gray-50 text-sm border border-gray-300 rounded
                focus:border-blue-500 px-3 py-2 focus:outline-none text-gray-800
                placeholder-gray-300 transition duration-200 ease-in-out focus:ring-2
                focus:ring-blue-500 focus:ring-opacity-20" required>
                                </div>
                                <div>
                                    <button type="submit" name="enviar"
                                            class="w-full border rounded shadow hover:bg-blue-600
                 px-6 py-2 bg-blue-500 text-sm text-white
                 ">
                                        Login
                                    </button>
                                </div>
                                <div class="text-center">
                                    <a class="text-gray-500 text-sm hover:underline" href="">Esqueci minha senha</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="rounded-md shadow-md border border-gray-300 mt-4 bg-gray-200">
                        <div class="p-4 text-center">
                            <p class="text-gray-800 text-sm">Não tem conta? <button class=" show-modal ml-1 text-blue-500 hover:underline text-sm">Criar conta</button></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{--<button class="show-modal bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white m-5">show modal</button>--}}

<div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded shadow-lg w-1/5 p-2">

        <div class="container border-b px-4 py-2 flex justify-between items-center">
            <div class="w-full">
                <h3 class="text-center text-4xl font-extrabold text-gray-600">Registro</h3>
            </div>
            <div class="ml-auto">
                <button class="text-black close-modal"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <form enctype="multipart/form-data" action="{{route('register')}}" method="post">
            @method('post')
            @csrf
            <div class="p-10 space-y-4">
                <div>
                    <label for="name"
                           class="text-md text-gray-800 mb-1">Nome</label>
                    <input id="nome" name="name" type="text" class="w-full bg-gray-50 border border-gray-300 focus:border-blue-500
                        rounded px-3 py-2 text-sm text-gray-800 placeholder-gray-300 focus:outline-none transition
                        duration-200 ease-in-out focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20" placeholder="Digite seu nome.." required>
                </div>

                <div>
                    <label for="email"
                           class="text-md text-gray-800 mb-1">E-mail</label>
                    <input id="email" name="email" type="text" class="w-full bg-gray-50 border border-gray-300 focus:border-blue-500
                rounded px-3 py-2 text-sm text-gray-800 placeholder-gray-300 focus:outline-none transition
                duration-200 ease-in-out focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20" placeholder="Digite seu e-mail.." required>
                </div>

                <div>
                    <label for="password"
                           class="text-md text-gray-800 mb-1">Senha</label>
                    <input id="password" name="password" type="password" class="w-full bg-gray-50 border border-gray-300 focus:border-blue-500
                rounded px-3 py-2 text-sm text-gray-800 placeholder-gray-300 focus:outline-none transition
                duration-200 ease-in-out focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20" placeholder="Digite sua senha.." required>
                </div>

            </div>
            <div class="flex justify-center items-center w-100 border-t o-3 p-8 space-x-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-xl text-white w-1/2">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.querySelector('.modal');
    const showModal = document.querySelector('.show-modal');
    const closeModal = document.querySelectorAll('.close-modal');

    showModal.addEventListener('click',function(){
       modal.classList.remove('hidden')
    });

    closeModal.forEach(close =>{
       close.addEventListener('click',function(){
           modal.classList.add('hidden')
       })
    });
    closeModal.addEventListener('click',function(){
       modal.classList.add('hidden')
    });
</script>
</body>
</html>


