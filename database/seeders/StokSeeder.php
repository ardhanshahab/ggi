<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stoks')->insert([
            [
                'id_barang' => 'KBL-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_barang' => 'KBL-02',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'KBL-03',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'LMP-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'MS-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'KB-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'BK-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'GT-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'KMR-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'LT-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'BM-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'BN-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id_barang' => 'BO-01',
                'status' => 'Available',
                'jumlah' => '10',
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ]);
    }
}
