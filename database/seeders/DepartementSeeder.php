<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('departements')->insert([
        [
            'nama_departement' => 'PT. URC',
            'lokasi_departement' => 'Bandung',
        ],
        [
            'nama_departement' => 'PT. ABC',
            'lokasi_departement' => 'Jakarta',
        ],
        [
            'nama_departement' => 'PT. XYZ',
            'lokasi_departement' => 'Surabaya',
        ],

        [
            'nama_departement' => 'PT. DEF',
            'lokasi_departement' => 'Bandung',
        ],
        [
            'nama_departement' => 'PT. MNM',
            'lokasi_departement' => 'Jakarta',
        ],
        [
            'nama_departement' => 'PT. KKL',
            'lokasi_departement' => 'Surabaya',
        ],
        [
            'nama_departement' => 'PT. EEE',
            'lokasi_departement' => 'Bandung',
        ],
        [
            'nama_departement' => 'PT. QQQ',
            'lokasi_departement' => 'Jakarta',
        ],
        [
            'nama_departement' => 'PT. POK',
            'lokasi_departement' => 'Surabaya',
        ],
        [
            'nama_departement' => 'Departemen M',
            'lokasi_departement' => 'Malang',
        ],
        [
            'nama_departement' => 'Departemen N',
            'lokasi_departement' => 'Yogyakarta',
        ],
        [
            'nama_departement' => 'Departemen O',
            'lokasi_departement' => 'Semarang',
        ],
    ]);
}

}
