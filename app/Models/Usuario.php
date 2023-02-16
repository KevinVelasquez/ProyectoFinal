<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $cedula
 * @property $nombre
 * @property $email
 * @property $rol
 * @property $contraseña
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'cedula' => 'required',
		'nombre' => 'required',
		'email' => 'required',
		'rol' => 'required',
		'contraseña' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombre','email','rol','contraseña','estado'];



}
