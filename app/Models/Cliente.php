<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $cedula
 * @property $nombre
 * @property $telefono
 * @property $direccion
 * @property $email
 * @property $estado
 * @property $id_municipio
 * @property $tipo_persona
 * @property $regimen
 * @property $tipo_comercio
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @property Regiman $regiman
 * @property TipoComercio $tipoComercio
 * @property TipoPersona $tipoPersona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'cedula' => 'required',
		'nombre' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'email' => 'required',
		'estado' => 'required',
		'id_municipio' => 'required',
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
    protected $fillable = ['cedula','nombre','telefono','direccion','email','estado','id_municipio','tipo_persona','regimen','tipo_comercio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'id_municipio');
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
