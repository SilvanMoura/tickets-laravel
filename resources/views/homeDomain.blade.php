<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <main>
                        <section>
                            <h1 class="text-4xl font-semibold mb-8">Lista de domínios</h1>

                            <table class="table-auto w-full bg-light">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Domínio</th>
                                        <th class="px-4 py-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($domains as $domain)
                                        <tr>
                                            <td class="px-4 py-2">
                                                <a href="/getDomainId/{{ $domain->id }}">
                                                    {{ $domain->id }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-2">{{ $domain->name }}</td>
                                            <td class="px-4 py-2">{{ $domain->domain }}</td>
                                            <td class="px-4 py-2">{{ $domain->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/createDomainForm" class="btn btn-success block mx-auto mt-4">Criar Domínio</a>
                        </section>
                    </main>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
