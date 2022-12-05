<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago_Clientes extends Model
{
    use HasFactory;
    
    public $fillable=[
        "fecha",
        "abono",
        "id_medio_pago",
        "id_pedido",
    ];

    public $timestamps = false;
    public function pagoclientes()
    {
       return $this->hasMany(\App\Models\Pedido::class, 'id');
    }
}
