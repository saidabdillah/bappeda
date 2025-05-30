<?php

namespace App\Livewire\Forms;

use App\Models\Skpd;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SkpdForm extends Form
{
    #[Validate('required')]
    public $perangkat_daerah_pelaksana = '';

    #[Validate('required')]
    public $skpd = '';

    protected function messages()
    {
        return [
            'skpd.required' => 'SKPD wajib diisi',
            'perangkat_daerah_pelaksana.required' => 'Perangkat Daerah Pelaksana wajib diisi',
        ];
    }

    public function store()
    {
        $this->validate();
        Skpd::create($this->all());
        $this->reset();
    }
}
