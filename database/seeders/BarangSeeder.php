<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Kabel A Europe',
                'kode_barang' => 'KBL-01',
                'jenis_barang' => 'Elektrik',
            ],
            [
                'nama_barang' => 'Kabel B Asia',
                'kode_barang' => 'KBL-02',
                'jenis_barang' => 'Elektrik',
            ],
            [
                'nama_barang' => 'Kabel C North America',
                'kode_barang' => 'KBL-03',
                'jenis_barang' => 'Elektrik',
            ],
            [
                'nama_barang' => 'Lampu LED 100W',
                'kode_barang' => 'LMP-01',
                'jenis_barang' => 'Perabot',
            ],
            [
                'nama_barang' => 'Mouse Wireless',
                'kode_barang' => 'MS-01',
                'jenis_barang' => 'Elektronik',
            ],
            [
                'nama_barang' => 'Keyboard Mechanical',
                'kode_barang' => 'KB-01',
                'jenis_barang' => 'Elektronik',
            ],
            [
                'nama_barang' => 'Buku Panduan Laravel',
                'kode_barang' => 'BK-01',
                'jenis_barang' => 'Buku',
            ],
            [
                'nama_barang' => 'Gunting Profesional',
                'kode_barang' => 'GT-01',
                'jenis_barang' => 'Alat Tulis',
            ],
            [
                'nama_barang' => 'Kamera DSLR',
                'kode_barang' => 'KMR-01',
                'jenis_barang' => 'Elektronik',
            ],
            [
                'nama_barang' => 'Laptop Gaming',
                'kode_barang' => 'LT-01',
                'jenis_barang' => 'Elektronik',
            ],
            [
                'nama_barang' => 'Barang M',
                'kode_barang' => 'BM-01',
                'jenis_barang' => 'Kategori M',
            ],
            [
                'nama_barang' => 'Barang N',
                'kode_barang' => 'BN-01',
                'jenis_barang' => 'Kategori N',
            ],
            [
                'nama_barang' => 'Barang O',
                'kode_barang' => 'BO-01',
                'jenis_barang' => 'Kategori O',
            ],
        ]);
    }

}
