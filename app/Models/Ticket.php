<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets'; // Nome da tabela no banco de dados

    protected $fillable = [
        'protocolo', // Título do ticket
        'title', // Descrição do ticket
        'type', 
        'description',
        'user_id',
        'responsible_id',
        'open_at',
        'closed_at',
        'closure_reason',
        'created_at',
        'updated_at',      
    ];

}