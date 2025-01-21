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
        Schema::create('jad_bels', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas');
            $table->string('nama_kelas');
            $table->unsignedBigInteger('periodes_id');
            $table->unsignedBigInteger('gurus_id');
            $table->timestamps();
        });

        Schema::table('jad_bels', function (Blueprint $table) {
            $table->foreign('periodes_id')->references('id')->on('periodes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gurus_id')->references('id')->on('gurus')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jad_bels');
    }
};
