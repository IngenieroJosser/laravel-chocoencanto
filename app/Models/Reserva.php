<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Reserva extends Model
{
    use HasFactory;

    // Aqui va el nombre de la tabla, me debo de asegurar que concidan
    protected $table = 'reserves'; // Añade esta línea

    use HasFactory;

    protected $fillable = [
        'destino',
        'fecha_inicio',
        'fecha_fin',
        'numero_personas',
        'tipo_tour',
        'transporte',
        'hospedaje',
        'alimentacion',
        'comentarios',
        'metodo_pago',
    ];

    // public function userReserves()
    // {
    //     return $this->belongsTo(Reserva::class);
    // }
}
