<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Informações do Ticket
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h2>Editar Informações do Domínio</h2>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $domainData['name'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="domain">Domínio</label>
                <input type="text" class="form-control" id="domain" name="domain" value="<?= $domainData['domain'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="domain" name="domain" value="<?= $domainData['status'] ?>" readonly>
            </div>
            <a href="/deletarDomain/{{ $domainData['id'] }}" class="btn btn-danger">Deletar</a>
            <a href="/updateDomainForm/{{ $domainData['id'] }}" class="btn btn-primary">Editar</a>
        </form>
    </div>
</x-app-layout>