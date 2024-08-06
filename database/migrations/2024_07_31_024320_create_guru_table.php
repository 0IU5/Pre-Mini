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
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nama');
            $table->integer('umur'); 
            $table->string('foto')->nullable(); 
            $table->string('pendidikan_terakhir');

            $table->unsignedBigInteger('id_mapel');
            $table->foreign('id_mapel')->references('id_mapel')->on('mapel')->onDelete('restrict');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
    