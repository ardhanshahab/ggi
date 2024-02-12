<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitras')->insert([
            [
                'id_nik' => '202402057787',
                'id_departement' => '1',
            ],
        ]);

        //memakai for agar lebih efisien
        for ($i = 1; $i <= 10; $i++) {
            DB::table('mitras')->insert([
                'id_nik' => '1234567890000' . $i,
                'id_departement' => $i,

            ]);
        }
    }
}
