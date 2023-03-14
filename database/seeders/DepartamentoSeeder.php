<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departamentos')->insert([
            'id' => 5,
            'nombre' => 'ANTIOQUIA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 8,
            'nombre' => 'ATLÁNTICO',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 11,
            'nombre' => 'BOGOTÁ, D.C.',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 13,
            'nombre' => 'BOLÍVAR',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 15,
            'nombre' => 'BOYACÁ',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 17,
            'nombre' => 'CALDAS',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 18,
            'nombre' => 'CAQUETÁ',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 19,
            'nombre' => 'CAUCA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 20,
            'nombre' => 'CESAR',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 23,
            'nombre' => 'CÓRDOBA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 25,
            'nombre' => 'CUNDINAMARCA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 27,
            'nombre' => 'CHOCÓ',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 41,
            'nombre' => 'HUILA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 44,
            'nombre' => 'LA GUAJIRA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 47,
            'nombre' => 'MAGDALENA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 50,
            'nombre' => 'META',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 52,
            'nombre' => 'NARIÑO',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 54,
            'nombre' => 'NORTE DE SANTANDER',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 63,
            'nombre' => 'QUINDIO',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 66,
            'nombre' => 'RISARALDA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 68,
            'nombre' => 'SANTANDER',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 70,
            'nombre' => 'SUCRE',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 73,
            'nombre' => 'TOLIMA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 76,
            'nombre' => 'VALLE DEL CAUCA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 81,
            'nombre' => 'ARAUCA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 85,
            'nombre' => 'CASANARE',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 86,
            'nombre' => 'PUTUMAYO',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 88,
            'nombre' => 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 91,
            'nombre' => 'AMAZONAS',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 94,
            'nombre' => 'GUAINÍA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 95,
            'nombre' => 'GUAVIARE',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 97,
            'nombre' => 'VAUPÉS',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 99,
            'nombre' => 'VICHADA',
            'id_paises' => 1,
        ]);

        DB::table('departamentos')->insert([
            'id' => 999,
            'nombre' => 'Internacional',
            'id_paises' => 2,
        ]);

        DB::table('departamentos')->insert([
            'id' => 1010,
            'nombre' => '<Seleccione>',
            'id_paises' => 2,
        ]);

    }
}
