<?php

use App\Enums\SantriStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Filament\Resources\SantriResource;
use Illuminate\Database\Migrations\Migration;
use Symfony\Component\Console\Helper\TableRows;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('status', ['tarbiyah','skill','khidmat','magang','berkarya','keluar']);
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->unsignedBigInteger('pekerjaans_id');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();
        });

        Schema::table('santris', function (Blueprint $table) {
            $table->foreign('pekerjaans_id')->references('id')->on('pekerjaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
