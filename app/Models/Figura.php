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
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }
    

}
