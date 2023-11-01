<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Encerrar Ticket</div>

                <div class="card-body">
                    <form method="post" action="/encerrarTicket/{{ $ticketData['protocol'] }}">
                        @csrf
                        <div class="form-group">
                            <p>Você deseja realmente encerrar o Ticket <strong>{{ $ticketData['title'] }}</strong>?</p>
                        </div>

                        <div class="form-group">
                            <label for="closure_reason">Qual o motivo do encerramento?</label>
                            <input type="text" id="closure_reason" name="closure_reason" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('dashboard') }}">
                                <button type="button" class="btn btn-success">Cancelar</button>
                            </a>
                            <button type="submit" name="encerrar" class="btn btn-danger">Encerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>