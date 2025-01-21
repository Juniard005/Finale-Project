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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas');
            $table->string('nama_kelas');
            $table->string('jurusan');
            $table->string('kapasitas');
            $table->unsignedBigInteger('gurus_id');
            $table->unsignedBigInteger('periodes_id');
            $table->timestamps();

            $table->foreign('gurus_id')->references('id')->on('gurus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('periodes_id')->references('id')->on('periodes')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
