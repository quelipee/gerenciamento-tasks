@extends('layouts.default')
@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Adicionar Tarefas</h1>
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{route('edit.task', $task->id)}}">
                    @method('put')
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="title" class="leading-7 text-sm text-gray-600">Nome da tarefa</label>
                                <input type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50
                                rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200
                                 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{old('title',$task->title)}}">
                            </div>
                            @error('title')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="date_end" class="leading-7 text-sm text-gray-600">Data de Conclusao</label>
                                <input type="date" id="date_end" name="date_end"
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                                       focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3
                                       leading-8 transition-colors duration-200 ease-in-out" value="{{old('date_end',$task->date_end)}}">
                            </div>
                            @error('date_end')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="status" class="leading-7 text-sm text-gray-600">Status</label>
                                <select name="status" id="status" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                                        focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3
                                        leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="Em andamento" >Em andamento</option>
                                    <option value="Finalizado" >Finalizado</option>
                                    <option value="Pausado" >Pausado</option>
                                </select>
                            </div>
                            @error('status')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea
                                    id="description" name="description"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                                    focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3
                                    leading-8 transition-colors duration-200 ease-in-out" >{{old('description',$task->description)}}</textarea>
                            </div>
                            @error('description')
                            <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-full">
                            <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Adicionar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
