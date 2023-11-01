<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Informações do Ticket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/createTicket">
                        @csrf
                        <input type="text" name="titulo" placeholder="Título">
                        <input type="text" name="tipo" placeholder="Tipo">
                        <input type="text" name="descricao" placeholder="Descrição">
                        <input type="text" name="responsavel_id" placeholder="ID do Responsável">
                        <button type="submit">Criar Ticket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>