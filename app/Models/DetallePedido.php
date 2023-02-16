<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class detalle_pedidos
 *
 * @property $id
 * @property $id_pedido
 * @property $id_producto
 * @property $cantidad
 * @property $precio
 * @property $imagen
 * @property $descripcion
 * 
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetallePedido extends Model
{
    
    static $rules = [
		'id_pedido' => 'required',
		'id_producto' => 'required',
		'cantidad' => 'required',
		'precio' => 'required',
    'imagen',
    'descripcion',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pedido','id_producto','cantidad','precio','imagen','descripcion'];



}
