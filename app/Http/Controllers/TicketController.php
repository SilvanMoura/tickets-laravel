<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

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

    public function createTicket()
    {
        return view('createTicket');
    }

}
