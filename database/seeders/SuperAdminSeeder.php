<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nombre' => 'Super_Administrador',
            'cedula' => '1017253837',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);


        $permisos = Permission::whereIn('name', [
            //permisos roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //permisos productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',

            //permisos insumos
            'ver-insumo',
            'crear-insumo',
            'editar-insumo',
            'borrar-insumo',

            //permisos figuras
            'ver-figura',
            'crear-figura',
            'editar-figura',
            'borrar-figura',

            //permisos pedidos
            'ver-pedido',
            'crear-pedido',
            'editar-pedido',
            'anular-pedido',
        ])->get();

        $rol = Role::create(['name' => 'Administrador']);

        $permisos = Permission::pluck('id', 'id')->all();

        $rol->syncPermissions($permisos);

        $admin->assignRole(['Administrador']);
    }
}
