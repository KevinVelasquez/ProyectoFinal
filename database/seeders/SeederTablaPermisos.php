<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            
            //permisos roles
            'Configuración',

            //permisos insumos
            'Usuarios',

            'Menu-Compras',
            //permisos proveedores
            'Proveedores',

            //permisos insumos
            'Insumos',

            //permisos ordenes de compra
            'Ordenes-de-Compras',

            'Menu-Ventas',
            //permisos clientes
            'Clientes',
        
            //permisos productos
            'Productos',
            
            //permisos pedidos
            'Pedidos',
            
            //permisos figuras
            'Figuras',

            
        ];
        
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
