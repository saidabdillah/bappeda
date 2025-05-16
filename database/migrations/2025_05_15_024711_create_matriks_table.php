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
        Schema::create('matrik', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan_program');
            $table->string('kode_program')->unique();
            $table->string('program_kegiatan');
            $table->string('alokasi_anggaran');
            $table->string('belanja_spesifik_sub_kegiatan');
            $table->string('anggaran_belanja_spesifik_sub_kegiatan');
            $table->string('sumber_pembiayaan');
            $table->string('realisasi_anggaran');
            $table->string('realisasi_anggaran_belanja_sub_kegiatan');
            $table->text('lokasi');
            $table->string('sarana_penerima_manfaat');
            $table->string('kendala_pelaksanaan');
            $table->string('besaran_manfaat');
            $table->string('durasi_pemberian_bantuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriks');
    }
};
