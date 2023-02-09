@extends('layouts.default')
@section('content')
    <div>
        <div class="container mx-auto mt-20 max-w-5xl">

            <div class="text-center p-2">
                <h2 class="text-4xl font-extrabold text-transparent
                                bg-clip-text bg-gradient-to-r
                                from-blue-blue_gradient_first to-blue-blue_gradient_end">Tarefas de(a) {{$user->name}}</h2>
            </div>

            <div class="border-b-2 p-4 shadow-md rounded border">
                <div class="border-b-2 grid grid-cols-5 text-center p-2 text-lg bg-gray-800 text-white font-bold">
                    <h3>#</h3>
                    <h3>Titulo</h3>
                    <h3>Status</h3>
                    <h3>Data de Inicio</h3>
                    <div>Data de Conclusão</div>
                </div>
                @if(empty($tasks))
                    <h2 class="font-bold text-gray-600 text-4xl text-center p-5">Não existem tarefas desse usuario!!</h2>
                @else
                    @foreach($tasks as $key => $task_user)
                        <a href="{{route('see.task.id.user',['user' => $user->name,'task' => $task_user->id])}}">
                            <div class="grid grid-cols-5  text-center p-2 text-lg bg-gray-100 text-gray-600">
                                <div>{{$task_user->id}}</div>
                                @php
                                    $title = $task_user->title;
                                @endphp
                                @if(strlen($title) > 17)
                                    <div>{{substr($task_user->title,0,17) }}</div>
                                @else
                                    <div>{{$task_user->title}}</div>
                                @endif
                                <div>{{$task_user->status}}</div>
                                <div>{{Carbon\Carbon::parse($task_user->created_at)->format('d/m/Y')}}</div>
                                <div>{{Carbon\Carbon::parse($task_user->date_end)->format('d/m/Y')}}</div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="text-end p-2">
                <a class="hover:underline hover:text-blue-400" href="{{route('all.tasks.users')}}">Voltar</a>
            </div>
            <div class="p-5">
                {{$tasks->links()}}
            </div>
        </div>
    </div>
@endsection
