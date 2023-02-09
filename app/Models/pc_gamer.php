<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pc_gamer extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'modelo',
        'preco',
        'foto',
    ];
}
