<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->string('email')->primary(); // Ubah menjadi primary key
        $table->string('nama');
        $table->string('password'); // Pastikan untuk mengenkripsi password
        $table->enum('role', ['admin', 'user']); // Tambahkan enum untuk role
        $table->date('last_login')->nullable(); // Tanggal terakhir user login
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
