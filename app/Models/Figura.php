<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Figura
 *
 * @property $id
 * @property $etiqueta
 * @property $imagen
 * @property $estado
 * @property $id_cliente
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Figura extends Model
{
    
    static $rules = [
		'etiqueta' => 'required',
		'imagen' => 'required',
		'estado' => 'required',
		'id_cliente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['etiqueta','imagen','estado','id_cliente'];



}
