<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 *
 * @property $id
 * @property $cedula
 * @property $nombre
 * @property $telefono
 * @property $pais
 * @property $departamento
 * @property $municipio
 * @property $direccion
 * @property $email
 * @property $estado
 * @property $tipo_persona
 * @property $regimen
 * @property $tipo_comercio
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra[] $compras
 * @property Regiman $regiman
 * @property TipoComercio $tipoComercio
 * @property TipoPersona $tipoPersona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedor extends Model
{
    
    static $rules = [
		'cedula' => 'required',
		'nombre' => 'required',
		'telefono' => 'required',
		'pais' => 'required',
		'departamento' => 'required',
		'municipio' => 'required',
		'direccion' => 'required',
		'email' => 'required',
		'estado' => 'required',
		'tipo_persona' => 'required',
		'regimen' => 'required',
		'tipo_comercio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombre','telefono','pais','departamento','municipio','direccion','email','estado','tipo_persona','regimen','tipo_comercio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras()
    {
        return $this->hasMany('App\Models\Compra', 'id_proveedor', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function regiman()
    {
        return $this->hasOne('App\Models\Regiman', 'id', 'regimen');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoComercio()
    {
        return $this->hasOne('App\Models\TipoComercio', 'id', 'tipo_comercio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoPersona()
    {
        return $this->hasOne('App\Models\TipoPersona', 'id', 'tipo_persona');
    }
    

}
