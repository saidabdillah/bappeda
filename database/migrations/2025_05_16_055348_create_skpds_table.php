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
        Schema::create('skpd', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan_program');
            $table->string('kode_program');
            $table->string('program_kegiatan');
            $table->integer('alokasi_anggaran');
            $table->string('belanja_spesifik_sub_kegiatan');
            $table->integer('anggaran_belanja_spesifik_sub_kegiatan');
            $table->string('sumber_pembiayaan');
            $table->string('realisasi_anggaran');
            $table->integer('realisasi_anggaran_belanja_spesifik_sub_kegiatan');
            $table->text('lokasi');
            $table->string('kendala_pelaksanaan');
            $table->string('besaran_manfaat');
            $table->string('durasi_pemberian_manfaat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuan_program');
    }
};
