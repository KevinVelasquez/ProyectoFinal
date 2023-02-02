<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    
    public $fillable=[
        "nombre",
        "id_pais"
    ];

    public $timestamps = false;
    public function pedidos()
    {
       return $this->hasMany(\App\Models\Pedido::class, 'id');
    }

    public function clientes()
    {
       return $this->hasMany(\App\Models\Cliente::class, 'id');
    }

    public function proveedores()
    {
       return $this->hasMany(\App\Models\Proveedor::class, 'id');
    }
}