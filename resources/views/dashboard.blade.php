<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <main>
                        <section>
                            <h1 class="text-4xl font-semibold mb-8">Lista de Tickets</h1>

                            <table class="table-auto w-full bg-light">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Título</th>
                                        <th class="px-4 py-2">Tipo</th>
                                        <th class="px-4 py-2">Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td class="px-4 py-2">
                                                <a href="/viewId/{{ $ticket->protocol }}">
                                                    {{ $ticket->protocol }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-2">{{ $ticket->title }}</td>
                                            <td class="px-4 py-2">{{ $ticket->type }}</td>
                                            <td class="px-4 py-2">{{ $ticket->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/createTicket" class="btn btn-success block mx-auto mt-4">Criar Ticket</a>
                        </section>
                    </main>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
