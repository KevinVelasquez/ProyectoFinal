<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Insumo
 *
 * @property $id
 * @property $nombre
 * @property $medidas
 * @property $estado
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Insumo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'medidas' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','medidas','estado'];

    public function detallecompra()
    {
        return $this->hasOne('App\Models\Detalle_compra', 'id', 'id_insumo', 'id_orden_compra');
    }

}
