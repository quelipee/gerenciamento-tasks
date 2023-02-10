<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen">

<header class="bg-gradient-to-tl from-gray-200 via-gray-100 to-gray-50 drop-shadow-xl">
    <div>
        <div class="container mx-auto px-4 border-b h-24 flex items-center">
            <a href="/index">
                <div class="flex flex-row">
                <img src="{{asset('img/logo2.png')}}" style="height: 57px">
                <h3 class="flex items-center justify-center ml-4
                text-3xl font-bold text-transparent
                                bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">Tasks Day's</h3>
            </div>
            </a>
            @if(Auth::user())
                <ul class="ml-auto space-x-5 flex items-center">
                    <li>
                        <a class="text-sm text-gray-600 hover:text-gray-800 hover:underline hover:text-lg" href="{{route('create.task')}}">Criar Tarefas</a>
                    </li>
                    <li>
                        <a href="{{route('all.tasks.users')}}" class="text-sm text-gray-600 hover:text-gray-800 hover:underline hover:text-lg">Outras Tarefas</a>
                    </li>
                    <li>
                        <a href="{{route('about')}}" class="text-sm text-gray-600 hover:text-gray-800 hover:underline hover:text-lg">Sobre nos</a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" class="text-sm text-gray-600 hover:text-gray-800 hover:underline hover:text-lg">Sair</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</header>

@yield('content')

<footer class="fixed inset-x-0 bottom-0">
    <div>
        <div class="container max-w-5xl mx-auto p-4 flex items-center justify-center">
            <div>
                <p class="text-sm text-gray-500">© 2023 Task Day's from Fuks</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
