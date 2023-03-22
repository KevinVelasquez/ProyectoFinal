<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tipo_persona;

class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_persona')->insert([
            'id' => 1,
            'nombre' => 'Natural',
        ]);

        DB::table('tipo_persona')->insert([
            'id' => 2,
            'nombre' => 'Jurídica',
        ]);
    }
}
