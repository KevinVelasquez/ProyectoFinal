<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{

    protected $table='Regimen';
    
    use HasFactory;
    
    public $fillable=[
        "nombre"
    ];

    public $timestamps = false;

    public function clientes()
    {
       return $this->hasMany(\App\Models\Cliente::class, 'id');
    }

    public function proveedores()
    {
       return $this->hasMany(\App\Models\Proveedore::class, 'id');
    }
}