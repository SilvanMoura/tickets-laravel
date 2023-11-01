<x-app-layout>
<div class="container mt-5">
    <h2>Criar Domínio</h2>
    <form method="POST" action="/createDomain">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="dominio">Domínio</label>
            <input type="text" class="form-control" id="dominio" name="dominio">
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
</x-app-layout>