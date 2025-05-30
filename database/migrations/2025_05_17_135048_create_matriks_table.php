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
        Schema::create('matriks', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->string('tujuan_program');
            $table->foreignId('perangkat_daerah_pelaksana')->constrained(
                table: 'skpd',
                indexName: 'matriks_skpd_id'
            );
            $table->string('kode');
            $table->foreign('kode')->references('kode')->on('program');
            $table->string('program');
            $table->string('kegiatan');
            $table->string('sub_kegiatan');
            $table->decimal('alokasi_anggaran', 20, 3);
            $table->string('belanja_spesifik_sub_kegiatan');
            $table->decimal('anggaran_belanja_spesifik_sub_kegiatan', 20, 3);
            $table->string('sumber_pembiayaan');
            $table->decimal('realisasi_anggaran', 20, 3);
            $table->decimal('realisasi_anggaran_belanja_sub_kegiatan', 20, 3);
            $table->text('lokasi');
            $table->string('sasaran_penerima_manfaat');
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
