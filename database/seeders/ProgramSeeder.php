<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'program' => 'PROGRAM PENGELOLAAN PENDIDIKAN',
            'kegiatan' => 'Mengurangi Beban Pengeluaran',
            'sub_kegiatan' => "Sub Kegiatan Penyediaan Biaya Personil Peserta Didik Sekolah Dasar",
            'kode' => '1.01.02.2.01.0021',
            'id_skpd' => 1,
        ]);
        Program::create([
            'program' => 'PROGRAM PENGELOLAAN PENDIDIKAN',
            'kegiatan' => 'Mengurangi Beban Pengeluaran',
            'sub_kegiatan' => "Penyediaan Biaya Personil Peserta Didik Sekolah Dasar",
            'kode' => '1.01.02.2.01.0032',
            'id_skpd' => 1,
        ]);
    }
}
