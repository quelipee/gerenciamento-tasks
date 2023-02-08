@extends('layouts.default')
@section('content')
    <div>
        <div class="container mx-auto mt-20 max-w-5xl">

            <div class="text-center p-2">
                <h2 class="text-4xl font-extrabold text-transparent
                                bg-clip-text bg-gradient-to-r
                                from-blue-blue_gradient_first to-blue-blue_gradient_end">TAREFAS ONLINES</h2>
            </div>

            <div class="border-b-2 p-4 shadow-md rounded border">
                <div class="border-b-2 grid grid-cols-4 text-center p-2 text-lg bg-gray-800 text-white font-semibold">
                    <h3>Nome</h3>
                    <h3>Numero total de tarefas</h3>
                    <h3>Email</h3>
                    <h3>Tarefas finalizadas</h3>
                </div>
                @foreach($tasks as $key => $task)
                    <a href="{{route('see.task.user', $task['name'])}}">
                        <div class="grid grid-cols-4  text-center p-1 text-lg bg-gray-100 text-gray-600 overflow-hidden text-truncate h-10">
                            <div>{{$task['name']}}</div>
                            <div>{{count($task['task'])}}</div>
                            <div>{{$task['email']}}</div>
                            <div>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($task['task'] as $task_user)
                                    @if('Finalizado' == $task_user['status'])
                                        @php
                                            $total += 1;
                                        @endphp
                                    @endif
                                @endforeach
                                {{$total}}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="p-5">
                {{$tasks->links()}}
            </div>
        </div>
    </div>

@endsection
