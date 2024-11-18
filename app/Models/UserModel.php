<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model; // Modelo de MongoDB
use Illuminate\Auth\Authenticatable; // Trait de autenticación
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class UserModel extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $connection = 'mongodb'; // Conexión MongoDB
    protected $table = 'users'; // Nombre de la colección
    protected $primaryKey = '_id'; // Llave primaria (Mongo usa `_id` por defecto)

    protected $fillable = ['user', 'email', 'password', 'rol'];
    protected $hidden = ['password']; // Oculta la contraseña al serializar
}
