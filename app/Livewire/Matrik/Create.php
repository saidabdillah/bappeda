<?php

namespace App\Livewire\Matrik;

use App\Models\Matrik;
use App\Models\Program;
use App\Models\Skpd;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $periode;
    public $tujuan_program;
    public $perangkat_daerah_pelaksana;
    public $kode;
    public $program;
    public $kegiatan;
    public $sub_kegiatan;
    public $alokasi_anggaran;
    public $belanja_spesifik_sub_kegiatan;
    public $anggaran_belanja_spesifik_sub_kegiatan;
    public $sumber_pembiayaan;
    public $realisasi_anggaran;
    public $realisasi_anggaran_belanja_sub_kegiatan;
    public $lokasi;
    public $sasaran_penerima_manfaat;
    public $kendala_pelaksanaan;
    public $besaran_manfaat;
    public $durasi_pemberian_bantuan;

    public $skpd = [], $kode_skpd;

    public function render()
    {
        $role = Auth::user()->getRoleNames()->first();

        if ($role === 'admin') {
            $this->skpd = Skpd::with('user')->get();
        } else {
            $this->skpd = User::with('skpd')->whereNot('id', 1)->where('id_skpd', Auth::user()->id_skpd)->get();
        }

        return view('livewire.matrik.create', [
            'skpd' => $this->skpd,
        ]);
    }

    public function mount()
    {
        $role = Auth::user()->getRoleNames()->first();

        if ($role === 'admin') {
            $this->skpd = Skpd::with('user')->get();
        } else {
            $this->skpd = User::with('skpd')->whereNot('id', 1)->where('id_skpd', Auth::user()->id_skpd)->get();
        }
    }


    public function save()
    {
        $this->validate([
            'periode' => 'required',
            'tujuan_program' => 'required',
            'perangkat_daerah_pelaksana' => 'required',
            'kode' => 'required',
            'program' => 'required',
            'kegiatan' => 'required',
            'sub_kegiatan' => 'required',
            'alokasi_anggaran' => 'required',
            'belanja_spesifik_sub_kegiatan' => 'required',
            'anggaran_belanja_spesifik_sub_kegiatan' => 'required',
            'sumber_pembiayaan' => 'required',
            'realisasi_anggaran' => 'required',
            'realisasi_anggaran_belanja_sub_kegiatan' => 'required',
            'lokasi' => 'required',
            'sasaran_penerima_manfaat' => 'required',
            'kendala_pelaksanaan' => 'required',
            'besaran_manfaat' => 'required',
            'durasi_pemberian_bantuan' => 'required',
        ]);
        Matrik::create($this->all());
        $this->dispatch('notif', message: 'Data berhasil disimpan', type: 'success', title: 'Berhasil');
        $this->reset();
    }
}
