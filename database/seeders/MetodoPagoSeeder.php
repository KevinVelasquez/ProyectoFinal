<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Metodo_Pago;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('metodo__pagos')->insert([
            'id' => 1,
            'nombre' => 'Contado',
        ]);

        DB::table('metodo__pagos')->insert([
            'id' => 2,
            'nombre' => 'Credito',
        ]);
    }
}
