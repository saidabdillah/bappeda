<?php

namespace App\Livewire\AdminCreate;

use App\Models\Matrik;
use Livewire\Component;

class CreateMatriks extends Component
{
    public $tujuan_program;
    public $kode_program;
    public $program_kegiatan;
    public $subkegiatan;
    public $alokasi_anggaran;
    public $belanja_spesifik_sub_kegiatan;
    public $anggaran_belanja_spesifik_sub_kegiatan;
    public $sumber_pembiayaan;
    public $realisasi_anggaran;
    public $realisasi_anggaran_belanja_sub_kegiatan;
    public $lokasi;
    public $sarana_penerima_manfaat;
    public $kendala_pelaksanaan;
    public $besaran_manfaat;
    public $durasi_pemberian_bantuan;

    public function save()
    {
        try {
            $this->validate([
                'tujuan_program' => 'required',
                'kode_program' => 'required',
                'program_kegiatan' => 'required',
                'alokasi_anggaran' => 'required',
                'belanja_spesifik_sub_kegiatan' => 'required',
                'anggaran_belanja_spesifik_sub_kegiatan' => 'required',
                'sumber_pembiayaan' => 'required',
                'realisasi_anggaran' => 'required',
                'realisasi_anggaran_belanja_sub_kegiatan' => 'required',
                'lokasi' => 'required',
                'sarana_penerima_manfaat' => 'required',
                'kendala_pelaksanaan' => 'required',
                'besaran_manfaat' => 'required',
                'durasi_pemberian_bantuan' => 'required',
            ]);

            Matrik::create($this->all());
            $this->reset();
            $this->dispatch('create-matriks', message: 'Data berhasil disimpan', type: 'success');
        } catch (\Exception $e) {
            dd($e);
            $this->dispatch('error-matriks', message: $e->getMessage(), type: 'error');
        }
    }

    public function render()
    {
        return view('livewire.admin-create.create-matriks');
    }
}
