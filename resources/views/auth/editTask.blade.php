@extends('layouts.default')
@section('content')
    <div>
        <div class="container mx-auto mt-20 px-4 max-w-5xl space-y-5 border rounded-md shadow p-4">
            <form enctype="multipart/form-data" method="POST" action="{{route('edit.task', $task->id)}}">
                @method('put')
                @csrf
                <div class="grid grid-cols-2 gap-4 space-y-3">
                    <div class="text-center col-span-2">
                        <h2 class="text-4xl mb-4 font-extrabold text-transparent
                                bg-clip-text bg-gradient-to-r
                                from-blue-blue_gradient_first to-blue-blue_gradient_end">EDITAR TAREFA</h2>
                    </div>

                    <div class="col-span-2">
                        <label for="title" class="block text-md
                text-gray-800 mb-1">Nome da tarefa</label>
                        <input placeholder="Digite sua tarefa..." type="text" name="title" id="title"
                               class="w-full bg-gray-50 text-md border border-gray-300 rounded
                focus:border-blue-500 px-3 py-2 focus:outline-none text-gray-800
                placeholder-gray-300 transition duration-200 ease-in-out focus:ring-2
                focus:ring-blue-500 focus:ring-opacity-20" required value="{{old('title',$task->title)}}">

                        @error('title')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>


                    <div>
                        <label for="date_end" class="block text-md
                text-gray-800 mb-1">Data de Conclusão</label>
                        <input type="date" id="date_end" name="date_end"
                               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                           focus:bg-white focus:ring-2 focus:ring-indigo-200 text-md outline-none text-gray-700 py-1 px-3
                           leading-8 transition-colors duration-200 ease-in-out" value="{{old('date_end',$task->date_end)}}">

                        @error('date_end')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-md text-gray-800 mb-1" for="status">Status</label>
                        <select type="text" name="status" id="status"
                               class="w-full bg-gray-50 text-lg border border-gray-300 rounded
                focus:border-blue-500 px-3 py-2 focus:outline-none text-gray-800
                placeholder-gray-300 transition duration-200 ease-in-out focus:ring-2
                focus:ring-blue-500 focus:ring-opacity-20" required>
                            <option value="Em andamento" {{ $task->status == 'Pendente' ? 'selected' : '' }}>Em andamento</option>
                            <option value="Pausado" {{ $task->status == 'Pausado' ? 'selected' : '' }}>Pausado</option>
                            <option value="Finalizado" {{ $task->status == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                        </select>

                        @error('status')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="description" class="block text-md
                text-gray-800 mb-1">Descrição</label>
                        <textarea
                            id="description" name="description"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                                    focus:bg-white focus:ring-2 focus:ring-indigo-200 text-md outline-none text-gray-700 py-1 px-3
                                    leading-8 transition-colors duration-200 ease-in-out" >{{old('description',$task->description)}}</textarea>

                        @error('description')
                        <div class="text-red-400 text-sm">{{$message}}</div>
                        @enderror

                    </div>

                    <div class="col-span-2 space-x-3 inline-flex items-center justify-end w-full">
                        <a class="hover:underline" href="/index">Voltar</a>
                        <button type="submit" class="rounded-md text-md text-white bg-blue-500 hover:bg-blue-400 px-6 py-2">Adicionar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
