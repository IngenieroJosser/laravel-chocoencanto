<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable; // Usa el modelo de MongoDB
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use Notifiable;
    
    // Nombre de la colección en MongoDB
    protected $collection = 'users'; // Cambia a `collection` en lugar de `table`

    /**
     * Los atributos que se pueden asignar de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'user',
        'email',
        'password',
        'rol'
    ];

    /**
     * Los atributos que deben ser ocultados para los arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
