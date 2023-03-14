<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Regimen;

class RegimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('regimen')->insert([
            'id' => 1,
            'nombre' => 'Simple',
        ]);

        DB::table('regimen')->insert([
            'id' => 2,
            'nombre' => 'Contributivo',
        ]);
    }
}
