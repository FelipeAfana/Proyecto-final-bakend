<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Atraccion;
use App\Models\Entrada;
use App\Models\User;

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
        'Total_reserva',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function atraccion()
    {
        return $this->belongsTo(Atraccion::class);
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'entrada_id');
    }
}
