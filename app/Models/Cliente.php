<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    


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

