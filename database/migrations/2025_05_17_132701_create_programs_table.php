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
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_skpd');
            $table->foreign('id_skpd')->references('id')->on('skpd');
            $table->string('kode')->unique();
            $table->string('program');
            $table->string('kegiatan');
            $table->string('sub_kegiatan');
            $table->decimal('alokasi_anggaran', 20, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
