<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $id_cliente
 * @property $id_municipio
 * @property $id_metodo_entrega
 * @property $id_medio_pago
 * @property $id_metodo_pago
 * @property $direccion
 * @property $fecha_registro
 * @property $fecha_entrega
 * @property $estado
 * @property $proceso
 * @property $abono
 * @property $totalpedido
 *
 * @property DetallePedido[] $detallePedidos
 * @property MedioPago $medioPago
 * @property MetodoEntrega $metodoEntrega
 * @property MetodoPago $metodoPago
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'id_cliente' => 'required',
		'id_municipio' => 'required',
		'id_metodo_entrega' => 'required',
		'id_metodo_pago' => 'required',
		'direccion' => 'required',
		'fecha_registro',
		'fecha_entrega' => 'required',
		'estado',
		'proceso',
        'cancelado',
		'totalpedido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_municipio','id_metodo_entrega','id_metodo_pago','direccion','fecha_registro','fecha_entrega','estado','proceso','totalpedido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\Models\DetallePedido', 'id_pedido', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metodoEntrega()
    {
        return $this->hasOne('App\Models\MetodoEntrega', 'id', 'id_metodo_entrega');
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
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'id_municipio');
    }
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }

}
