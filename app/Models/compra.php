<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $n_orden
 * @property $fecha_compra
 * @property $cantidad
 * @property $precio_unitario
 * @property $total
 * @property $estado
 * @property $id_proveedor
 * @property $id_insumo
 * @property $id_metodo_pago
 *
 * @property DetalleCompra[] $detalleCompras
 * @property Insumo $insumo
 * @property metodo_pagos $metodo_pagos
 * @property Proveedor $proveedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'n_orden' => 'required',
		'fecha_compra' => 'required',
		'anulado' => 'required',
		'total' => 'required',
		'estado' => 'required',
		'id_proveedor' => 'required',
		'id_metodo_pagos' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'compra';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['n_orden','fecha_compra','anulado','total','estado','id_proveedor','id_metodo_pagos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\Models\Detalle_compra', 'id_orden_compra', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insumo()
    {
        return $this->hasOne('App\Models\insumo', 'id', 'id_insumo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metodo_pagos()
    {
        return $this->hasOne('App\Models\metodo_pagos', 'id', 'id_metodo_pagos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'id_proveedor');
    }
    

}
