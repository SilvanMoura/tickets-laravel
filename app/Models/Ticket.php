<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'protocol';

    protected $fillable = [
        'protocol', 
        'title', 
        'type', 
        'description',
        'user_id',
        'responsible_id',
        'open_at',
        'closed_at',
        'closure_reason',
        'created_by',
        'created_at',
        'updated_at',      
    ];
}