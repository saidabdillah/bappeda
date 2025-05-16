<?php

namespace App\Exports;

use App\Models\Matrik;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MatrikExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        return Matrik::select(
            'tujuan_program',
            'kode_program',
            'program_kegiatan',
            'alokasi_anggaran',
            'belanja_spesifik_sub_kegiatan',
            'anggaran_belanja_spesifik_sub_kegiatan',
            'sumber_pembiayaan',
            'realisasi_anggaran',
            'realisasi_anggaran_belanja_sub_kegiatan',
            'lokasi',
            'sarana_penerima_manfaat',
            'kendala_pelaksanaan',
            'besaran_manfaat',
            'durasi_pemberian_bantuan',
        )
            ->whereMonth('created_at', $bulan)  // April
            ->whereYear('created_at', $tahun)
            ->get();;
    }

    public function headings(): array
    {
        return [
            'Tujuan Program',
            'Kode Program',
            'Program Kegiatan',
            'Alokasi Anggaran (Rp)',
            'Belanja Spesifik Sub Kegiatan',
            'Anggaran Belanja Spesifik Sub Kegiatan',
            'Sumber Pembiayaan',
            'Realisasi Anggaran (Rp)',
            'Realisasi Anggaran Belanja Sub Kegiatan',
            'Lokasi',
            'Sarana penerima Manfaat',
            'Kendala Pelaksanaan',
            'Besaran Manfaat',
            'Durasi Pemberian Bantuan',
        ];
    }
}
