<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Informações do Ticket
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/updateTicket/{{ $ticketData['protocol'] }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="protocolo">Protocolo</label>
                            <input type="text" class="form-control" id="protocolo" name="protocolo" value="{{ $ticketData['protocol'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $ticketData['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $ticketData['type'] }}">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao">{{ $ticketData['description'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="user_id">ID do Usuário</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $ticketData['user_id'] }}">
                        </div>
                        <div class="form-group">
                            <label for="responsavel_id">ID do Responsável</label>
                            <input type="text" class="form-control" id="responsavel_id" name="responsavel_id" value="{{ $ticketData['responsible_id'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="data_abertura">Data de Abertura</label>
                            <input type="text" class="form-control" id="data_abertura" name="data_abertura" value="{{ $ticketData['open_at'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="criado_por">Criado por</label>
                            <input type="text" class="form-control" id="criado_por" name="criado_por" value="{{ $ticketData['created_by'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="data_criacao">Data de Criação</label>
                            <input type="text" class="form-control" id="data_criacao" name="data_criacao" value="{{ $ticketData['created_at'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ultima_atualizacao">Última Atualização</label>
                            <input type="text" class="form-control" id="ultima_atualizacao" name="ultima_atualizacao" value="{{ $ticketData['updated_at'] }}" readonly>
                        </div>
                        <div class="mt-4">
                            <button type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>