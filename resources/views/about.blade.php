@extends('layouts.default')
@section('content')
    <div class="mt-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 text-center space-x-20">
                <div class="p-8 bg-white rounded-lg shadow-lg">
                    <h1 class="text-5xl font-bold text-center text-gray-600">Sobre Nós</h1>
                    <p class="text-left text-gray-500 text-base p-4">Somos uma plataforma dedicada a ajudar as pessoas a gerenciarem e compartilharem suas tarefas de maneira eficiente. Nosso objetivo é oferecer uma ferramenta intuitiva e fácil de usar para que as pessoas possam manter o controle de suas atividades diárias e alcançar seus objetivos.<br>
                        Nossa missão é simplificar o processo de gerenciamento de tarefas, permitindo que as pessoas possam se concentrar em suas tarefas e alcançar seus objetivos com mais facilidade. Nós acreditamos que, ao fornecer uma plataforma confiável e fácil de usar, podemos ajudar as pessoas a alcançar seus objetivos e realizar suas metas.<br>
                        Em resumo, nós estamos aqui para ajudar você a gerenciar suas tarefas de forma eficiente e compartilhá-las com outras pessoas quando necessário. Juntos, vamos ajudá-lo a alcançar seus objetivos e realizar suas metas.
                    </p>
                </div>

                <div>
                    <img src="{{ asset('img/task.webp') }}" style="" class="rounded-3xl shadow-md" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
