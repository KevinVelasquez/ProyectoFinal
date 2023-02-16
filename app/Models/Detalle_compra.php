<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property Compra $compra
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detalle_compra extends Model
{
    use HasFactory;
    
    protected $table = 'detalle_compra';

    protected $fillable = ['cantidad', 'valor_unitario', 'id_orden_compra', 'id_insumo'];

    public $timestamps = false;

    public function insumo()
    {
        return $this->hasOne('App\Models\insumo', 'id', 'id_insumo');
    }

    public function orden()
    {
        return $this->hasOne('App\Models\Compra', 'id', 'id_orden_compra');
    }

    public function detalleCompras()
    {
        return $this->hasMany('App\Models\Detalle_compra', 'id_orden_compra', 'id');
    }
}
