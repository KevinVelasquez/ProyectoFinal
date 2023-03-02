<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PagoProveedore
 *
 * @property $id
 * @property $fecha
 * @property $abono
 * @property $estado
 * @property $id_medio_pagos
 * @property $id_compra
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra $compra
 * @property MedioPago $medioPago
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PagoProveedore extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'abono' => 'required',
		'estado' => 'required',
		'id_compra' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','abono','estado','id_medio_pagos','id_compra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function compra()
    {
        return $this->hasOne('App\Models\Compra', 'id', 'id_compra');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medioPago()
    {
        return $this->hasOne('App\Models\MedioPago', 'id', 'id_medio_pagos');
    }
    

}
