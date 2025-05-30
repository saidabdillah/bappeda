<?php

namespace Database\Seeders;

use App\Models\Matrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matrik::create([
            'tanggal' => now()->format('Y-m-d'),
            'tujuan_program' => 'Mengurangi Beban Pengeluaran',
            'perangkat_daerah_pelaksana' => 2,
            'kode' => '1.01.02.2.01.0021',
            'program' => 'PROGRAM PENGELOLAAN PENDIDIKAN',
            'kegiatan' => 'Kegiatan Pengelolaan Pendidikan Sekolah Dasar',
            'sub_kegiatan' => 'Sub Kegiatan Penyediaan Biaya Personil Peserta Didik Sekolah Dasar',
            'alokasi_anggaran' => 10000000,
            'belanja_spesifik_sub_kegiatan' => 10000000,
            'anggaran_belanja_spesifik_sub_kegiatan' => 10000000,
            'sumber_pembiayaan' => 'Tidak Tau',
            'realisasi_anggaran' => 10000000,
            'realisasi_anggaran_belanja_sub_kegiatan' => 10000000,
            'lokasi' => 'Tidak Tau',
            'sasaran_penerima_manfaat' => 'Tidak Tau',
            'kendala_pelaksanaan' => 'Tidak Tau',
            'besaran_manfaat' => 'Tidak Tau',
            'durasi_pemberian_bantuan' => 'Tidak Tau',
        ]);
    }
}
