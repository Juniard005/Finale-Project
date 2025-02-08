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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santris_id');
            $table->string('nama_kegiatan');
            $table->string('waktu_kegiatan');
            $table->enum('status',['hadir','sakit','izin','alpha']);
            $table->unsignedBigInteger('gurus_id');
            $table->timestamps();
        });

        Schema::table('absensis', function (Blueprint $table) {
            $table->foreign('santris_id')->references('id')->on('santris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gurus_id')->references('id')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
