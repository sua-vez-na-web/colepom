<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cycle',
        'amount'
    ];

    const CYCLE = [
        'MONTHLY'    => 'Mensal',
        'SEMIANUALLY'   => 'Semestral',
        'YEARLY'    => 'Anual',
        // 'IN_PROGRESS' => 'Em Andamento',
        // 'FAULT'       => 'Falta',
        // 'HOLIDAY'     => 'Feriado',
        // 'EMPTY'       => 'Vazio',
        // 'DAY_OFF'     => 'Folga'
    ];
}
