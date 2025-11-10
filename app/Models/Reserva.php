<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'Fecha',
        'Hora_entrada',
        'Cantidad',
        'Estado',
        'user_id',
        'entrada_id',
    ];


}
