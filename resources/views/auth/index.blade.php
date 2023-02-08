@extends('layouts.default')
@section('title','Tasks Days')
@section('content')
    <div class="px-5">
        <div class="container mx-auto mt-20 px-4 max-w-5xl space-y-5 border rounded-md shadow p-4">
            <div>
                <form action="{{route('index')}}" method="get" class="flex items-center space-x-5">
                    <div class="w-screen">
                        <input type="text" class="w-full bg-gray-50 border border-gray-300 focus:border-blue-500 rounded px-3 py-2
                text-base text-gray-800 placeholder-gray-300 focus:outline-none" placeholder="Pesquisar Tarefa.." value="{{request()->search}}" id="search" name="search">
                    </div>
                    <div class="flex items-center space-x-2">
                        <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Buscar</button>
                        <a href="/index" >Limpar</a>
                    </div>
                </form>
            </div>


            <div class="border-b-2 p-4 shadow-md rounded border">
                <div class="border-b-2 grid grid-cols-6 text-center p-2 text-lg bg-gray-800 text-white font-semibold">
                    <h3>#</h3>
                    <h3>Tarefas</h3>
                    <h3>Status</h3>
                    <h3>Data de Inicio</h3>
                    <h3>Data de Conclusão</h3>
                    <h3>Ações</h3>
                </div>
                @foreach($tasks as $key => $task)
                    <a href="{{route('task.view',$task->id)}}">
                        <div class="grid grid-cols-6 text-center justify-center p-2 text-lg bg-gray-100 text-gray-600">
                            <div>{{$task->id}}</div>
                            <div>{{$task->title}}</div>
                            <div>{{$task->status}}</div>
                            <div>{{Carbon\Carbon::parse($task->created_at)->format('d/m/Y')}}</div>
                            <div>{{Carbon\Carbon::parse($task->date_end)->format('d/m/Y')}}</div>
                            <div class="md:flex items-center justify-center space-x-2">

                                <form action="{{route('delete.task',$task->id)}}" method="post">
{{--                                    para usar o metodo delete no @method vc tem que utilizar no form o metodo post--}}
                                    @method('delete')
                                    @csrf
                                    <button class="bg-red-500 text-sm p-3 px-4 py-1
                                    rounded text-white hover:bg-red-400 w-20"
                                    >Deletar</button>
                                </form>
                                    @if($task->status != 'Finalizado')
                                        <form action="{{route('end.task', $task->id)}}" method="post">
                                            @method('put')
                                            @csrf
                                            <button class="w-20 bg-green-500 text-sm p-3 px-4 py-1 rounded text-white hover:bg-green-400">Concluir</button>
                                        </form>
                                    @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-right">
                {{$tasks->links()}}
            </div>
        </div>
    </div>
@endsection

@error('errors')
<script>
    var message = '{{$message}}';
    alert(message);
</script>
@enderror
