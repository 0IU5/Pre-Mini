<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal'); // ID utama
            $table->time('start_time'); // Waktu mulai
            $table->time('end_time'); // Waktu selesai
            $table->unsignedBigInteger('id_paket'); // Foreign key untuk paket
            $table->unsignedBigInteger('id_mapel'); // Foreign key untuk mapel
            $table->unsignedBigInteger('id_guru'); // Foreign key untuk guru
            $table->unsignedBigInteger('id_payment'); // Foreign key untuk pembayaran
            $table->timestamps(); // Kolom timestamps (created_at dan updated_at)
            
            // Definisikan foreign key
            $table->foreign('id_paket')->references('id_paket')->on('paket')->onDelete('restrict');
            $table->foreign('id_mapel')->references('id_mapel')->on('mapel')->onDelete('restrict');
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('restrict');
            $table->foreign('id_payment')->references('id_payment')->on('payment')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
};

