<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Reserva extends Model
{
    // Nombre de la colección en MongoDB
    protected $collection = 'reserves';

    // Campos asignables en masa
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
        'user_id'
    ];

    // Relación con el modelo User (una reserva pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', '_id');
    }
}
