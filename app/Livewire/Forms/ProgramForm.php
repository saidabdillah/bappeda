<?php

namespace App\Livewire\Forms;

use App\Models\Program;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProgramForm extends Form
{
    #[Validate('required')]
    public $program = '';

    #[Validate('required')]
    public $kegiatan = '';

    #[Validate('required')]
    public $sub_kegiatan = '';

    #[Validate('required')]
    public $kode = '';

    #[Validate('required')]
    public int $id_skpd = 0;

    #[Validate('required')]
    public $alokasi_anggaran = '';

    public function store()
    {
        $this->validate();
        Program::create($this->all());
        $this->reset();
    }

    public function messages()
    {
        return [
            'program.required' => 'Program harus diisi',
            'kegiatan.required' => 'Kegiatan harus diisi',
            'sub_kegiatan.required' => 'Sub Kegiatan harus diisi',
            'kode.required' => 'Kode harus diisi',
            'id_skpd.required' => 'Id Skpd harus diisi',
            'alokasi_anggaran.required' => 'Alokasi Anggaran harus diisi',
        ];
    }
}
