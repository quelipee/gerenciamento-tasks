@extends('layouts.default')
@section('title','index')
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
            <div class="lg:grid lg:grid-cols-7 lg:gap-2 border rounded-md shadow p-2 flex items-center justify-center text-center space-y-1 bg-gray-100">
                <div class="font-bold text-gray-600">#</div>
                <div class="font-bold text-gray-600">Task</div>
                <div class="font-bold text-gray-600">Descrição</div>
                <div class="font-bold text-gray-600">Status</div>
                <div class="font-bold text-gray-600">Data de Conclusão</div>
                <div class="font-bold text-gray-600 col-span-2">Ações</div>
                @foreach($tasks as $task)
                    <div>{{$task->id}}</div>
                    <div>{{$task->title}}</div>
                    <div>{{$task->description}}</div>
                    <div>{{$task->status}}</div>
                    <div>{{ Carbon\Carbon::parse($task->date_end)->format('d/m/Y') }}</div>
                    <div class="flex items-center justify-center p-2 space-x-2 col-span-2">
                        @if($task->status != 'Finalizado')
                            <a href="{{route('show.task.update',$task->id)}}" class="edit mt-3 text-white text-sm p-4 px-4 py-1 hover:bg-blue-400 rounded inline-flex items-center bg-blue-500 ">Editar</a>
                        @endif
                        <form action="{{route('delete.task',$task->id)}}" method="post">
                            {{--para usar o metodo delete no @method vc tem que utilizar no form o metodo post--}}
                            @method('delete')
                            @csrf
                            <button class="mt-3 inline-flex items-center bg-red-500 text-sm p-3 px-4 py-1 rounded text-white hover:bg-red-400">Deletar</button>
                        </form>
                        @if($task->status != 'Finalizado')
                            <form action="{{route('end.task', $task->id)}}" method="post">
                                @method('put')
                                @csrf
                                <button class="mt-3 inline-flex items-center bg-green-500 text-sm p-3 px-4 py-1 rounded text-white hover:bg-green-400">Concluir</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="text-right">
                {{$tasks->links()}}
            </div>
        </div>
    </div>

{{--<section class="text-gray-600">--}}
{{--    <div class="container px-5 py-24 mx-auto">--}}
{{--        <div class="lg:w-2/3 w-full mx-auto overflow-auto">--}}
{{--            <div class="flex items-center justify-between mb-2">--}}
{{--                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Produtos</h1>--}}
{{--                <a href="{{route('store.task')}}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>--}}
{{--            </div>--}}
{{--            <table class="table-auto w-full text-left whitespace-no-wrap">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                @foreach($user->task as $task)--}}
{{--                        <h3>{{ $task->user_id }}</h3>--}}
{{--                    @endforeach--}}
{{--                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#</th>--}}
{{--                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100" style="width: 150px">Data de Conclução</th>--}}
{{--                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Tarefa</th>--}}
{{--                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Descrição</th>--}}
{{--                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Status</th>--}}
{{--                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">Ações</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody class="divide-y">--}}
{{--                @foreach($tasks as $task)--}}
{{--                    <tr class="bg-gray-100">--}}
{{--                        <td class="px-4 py-3">{{$task->id}}</td>--}}
{{--                        <td class="px-4 py-3">{{ Carbon\Carbon::parse($task->date_end)->format('d/m/Y') }}</td>--}}
{{--                        <td class="px-4 py-3">{{$task->title}}</td>--}}
{{--                        <td class="px-4 py-3">{{$task->description}}</td>--}}
{{--                        <td class="px-4 py-3">{{$task->status}}</td>--}}
{{--                        <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">--}}
{{--                            @if($task->status != 'Finalizado')--}}
{{--                            <a href="{{route('show.task.update',$task->id)}}" class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>--}}
{{--                            @endif--}}
{{--                            <form action="{{route('delete.task',$task->id)}}" method="post">--}}
{{--                                --}}{{--para usar o metodo delete no @method vc tem que utilizar no form o metodo post--}}
{{--                                @method('delete')--}}
{{--                                @csrf--}}
{{--                                <button class="mt-3 text-indigo-500 inline-flex items-center">Deletar</button>--}}
{{--                            </form>--}}
{{--                            @if($task->status != 'Finalizado')--}}
{{--                            <form action="{{route('end.task', $task->id)}}" method="post">--}}
{{--                                @method('put')--}}
{{--                                @csrf--}}
{{--                                <button class="mt-3 text-indigo-500 inline-flex items-center">Concluir</button>--}}
{{--                            </form>--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        {{dd($user->task)}}--}}
{{--    </div>--}}
{{--</section>--}}
@endsection
