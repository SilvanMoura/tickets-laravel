<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';

    protected $fillable = [
        'id', 
        'name', 
        'domain', 
        'status',
        'created_by',
        'created_at',
        'updated_at',      
    ];
}