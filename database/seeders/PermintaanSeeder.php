<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermintaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 9; $i++) {
        DB::table('permintaans')->insert([
            [
                'nik' => '1234567890000'. $i,
                'tanggal_permintaan' => '2024-01-0' . $i,
            ],
        ]);
        DB::table('permintaans')->insert([
            [
                'nik' => '1234567890000',
                'tanggal_permintaan' => '2024-01-21',
            ],
        ]);

        }
    }
}
