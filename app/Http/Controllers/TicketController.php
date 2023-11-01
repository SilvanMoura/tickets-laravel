<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Exibe todos os tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function ticketAll()
    {
        // Recupere todos os tickets do banco de dados
        $tickets = Ticket::all();

        // Retorne a view 'dashboard' e passe os dados dos tickets usando compact()
        return view('dashboard', compact('tickets'));
    }

    public function createTicketForm()
    {
        return view('createTicket');
    }

    public function createTicket(Request $request)
    {
        $titulo = $request->input('titulo');
        $tipo = $request->input('tipo');
        $descricao = $request->input('descricao');
        $responsavel_id = $request->input('responsavel_id');

        // Validação dos campos
        $request->validate([
            'titulo' => 'required|string',
            'tipo' => 'required|string',
            'descricao' => 'required|string',
            'responsavel_id' => 'required|integer',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
        }

        $dataAtual = date('Y-m-d');
        $horaAtual = date('H:i:s');
        $horaUpdate = "$dataAtual $horaAtual";

        $ticket = new Ticket;
        $ticket->title = $titulo;
        $ticket->type = $tipo;
        $ticket->description = $descricao;
        $ticket->responsible_id = $responsavel_id;
        $ticket->user_id = $userId;
        $ticket->created_by = $userId;
        $ticket->open_at = $horaUpdate;

        // Salve o ticket no banco de dados
        $ticket->save();

        // Redirecione ou retorne uma resposta, por exemplo:
        return redirect()->route('dashboard');
    }

    public function viewTicketById($protocol)
    {
        $ticket = Ticket::where('protocol', $protocol)->first();

        return view('viewTicket', ['ticketData' => $ticket]);
    }
    public function deletarTicket($protocol)
    {
        $ticket = Ticket::where('protocol', $protocol)->first();
        if ($ticket) {
            $ticket->delete();

            return redirect()->route('dashboard');
        }
    }
    public function editarTicketForm($protocol)
    {
        $ticket = Ticket::where('protocol', $protocol)->first();

        return view('editTicket', ['ticketData' => $ticket]);
    }

    public function updateTicket(Request $request, $protocol)
    {
        $ticket = Ticket::where('protocol', $protocol)->first();

        if (!$ticket) {
            return redirect()->route('dashboard')->with('error', 'Ticket não encontrado');
        }

        // Atualize os campos do ticket com base nos dados do formulário
        $ticket->title = $request->input('titulo');
        $ticket->type = $request->input('tipo');
        $ticket->description = $request->input('descricao');
        $ticket->responsible_id = $request->input('responsavel_id');
        $ticket->open_at = $request->input('data_abertura');

        $ticket->save();

        return redirect()->route('dashboard')->with('success', 'Ticket atualizado com sucesso');
    }

    public function encerrarTicketForm($protocol)
    {
        $ticket = Ticket::where('protocol', $protocol)->first();

        if (!$ticket) {
            return redirect()->route('dashboard')->with('error', 'Ticket não encontrado');
        }

        return view('close', ['ticketData' => $ticket]);
    }

    public function encerrarTicket(Request $request, $protocol)
    {
        $ticket = Ticket::where('protocol', $protocol)->first();

        if (!$ticket) {
            return redirect()->route('dashboard')->with('error', 'Ticket não encontrado');
        }

        $ticket->closed_at = now();
        $ticket->closure_reason = $request->input('closure_reason');

        $ticket->save();

        return redirect()->route('dashboard')->with('success', 'Ticket encerrado com sucesso');
    }
}
