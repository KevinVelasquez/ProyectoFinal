<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property Regimen $regimen
 * @property Tipo_Comercio $tipoComercio
 * @property Tipo_Persona $tipoPersona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Cliente extends Model
{
    use HasFactory;

    protected $perPage = 20;

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
    public function regimen()
    {
        return $this->hasOne('App\Models\Regimen', 'id', 'regimen');
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

