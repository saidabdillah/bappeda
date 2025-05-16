<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SkpdForm extends Form
{
    #[Validate]
    public $skpd, $anggaran, $realisasi, $anggaran_spesifik, $realisasi_spesifik;

    protected function rules()
    {
        return [
            'skpd' => 'required|min:3',
            'anggaran' => 'required|digits:5|numeric',
            'realisasi' => 'required|min:3',
            'anggaran_spesifik' => 'required|digits:5|numeric',
            'realisasi_spesifik' => 'required|digits:5|numeric',
        ];
    }

    public function store()
    {
        $this->validate();
    }
}
