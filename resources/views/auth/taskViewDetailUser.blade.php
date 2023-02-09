@extends('layouts.default')
@section('content')
    <div>
        <div class="container mx-auto mt-20 max-w-5xl">
            <div class="text-center p-2">
                <h2 class="text-4xl font-extrabold text-transparent
                                bg-clip-text bg-gradient-to-r
                                from-blue-blue_gradient_first to-blue-blue_gradient_end">Tarefa: {{$task->id}}</h2>
            </div>

            <table class="table-fixed w-full text-center bg-white shadow-md">
                <thead class="bg-gray-800">
                <tr class="text-white">
                    <th class="px-4 py-2">Tarefa</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Data de Criação</th>
                    <th class="px-4 py-2">Data de Conclusão</th>
{{--                    <th class="px-4 py-2">Editar</th>--}}
                </tr>
                </thead>
                <tbody>
                <tr class="bg-gray-100">
                    <td class="px-4 py-2">{{$task->title}}</td>
                    <td class=" px-4 py-2">{{$task->status}}</td>
                    <td class=" px-4 py-2">{{Carbon\Carbon::parse($task->created_at)->format('d/m/Y')}}</td>
                    <td class=" px-4 py-2">{{Carbon\Carbon::parse($task->date_end)->format('d/m/Y')}}</td>
{{--                    <td class=" px-4 py-2">--}}
{{--                        <form action="{{route('show.task.update',$task->id)}}">--}}
{{--                            @if($task->status == 'Finalizado')--}}
{{--                                <button disabled class="w-20 bg-blue-500 text-sm p-3 px-4 py-1 rounded text-white hover:bg-blue-400">Editar</button>--}}
{{--                            @else--}}
{{--                                <button class="w-20 bg-blue-500 text-sm p-3 px-4 py-1 rounded text-white hover:bg-blue-400">Editar</button>--}}
{{--                            @endif--}}
{{--                        </form>--}}
{{--                    </td>--}}
                </tr>
                </tbody>
                <thead class="bg-gray-800">
                <tr class="text-white">
                    <th class="px-4 py-2" colspan="4">Descrição</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-gray-100">
                    <td class="px-4 py-2" colspan="4">{{$task->description}}</td>
                </tr>
                </tbody>
            </table>
            <div class="text-end p-2">
                <a class="hover:underline hover:text-blue-400" href="{{url()->previous()}}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
