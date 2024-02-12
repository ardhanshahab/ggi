<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghitunganGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghitungan_gajis', function (Blueprint $table) {
            $table->id();
            $table->string('periode'); // Tahun-bulan (misal: 2024-02)
            $table->date('tanggal');
            $table->string('kode_nik');
            $table->integer('jumlah_hadir');
            $table->decimal('gaji_pokok', 10, 2);
            $table->decimal('insentif', 10, 2);
            $table->decimal('pot_asuransi', 5, 2);
            $table->decimal('total_gaji', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penghitungan_gajis');
    }
}
