<?php

namespace Database\Seeders;

use App\Models\Skpd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skpd::create([
            'skpd' => 'DISDIKBUD',
            'perangkat_daerah_pelaksana' => 'Dinas Pendidikan dan Kebudayaan',
            'alokasi_anggaran' => 100000000000,
            'id_user' => 2
        ]);

        Skpd::create([
            'skpd' => 'BPBD',
            'perangkat_daerah_pelaksana' => 'Badan Penanggulangan Bencana Daerah',
            'alokasi_anggaran' => 100000000000,
            'id_user' => 3
        ]);
    }
}
