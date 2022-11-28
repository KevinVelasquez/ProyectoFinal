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
 * @property MetodoPago $metodoPago
 * @property Proveedor $proveedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'n_orden' => 'required',
		'fecha_compra' => 'required',
		'cantidad' => 'required',
		'precio_unitario' => 'required',
		'total' => 'required',
		'estado' => 'required',
		'id_proveedor' => 'required',
		'id_insumo' => 'required',
		'id_metodo_pago' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'compra';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['n_orden','fecha_compra','cantidad','precio_unitario','total','estado','id_proveedor','id_insumo','id_metodo_pago'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\Models\DetalleCompra', 'id_orden_compra', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insumo()
    {
        return $this->hasOne('App\Models\Insumo', 'id', 'id_insumo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metodoPago()
    {
        return $this->hasOne('App\Models\MetodoPago', 'id', 'id_metodo_pago');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'id_proveedor');
    }
    

}
