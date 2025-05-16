<?php

namespace App\Livewire\Skpd;

use App\Livewire\Forms\SkpdForm;
use Livewire\Component;

class Entry extends Component
{

    public SkpdForm $form;

    public function render()
    {
        return view('livewire.skpd.entry');
    }

    public function save()
    {
        try {
            $this->form->store();

            $this->dispatch('create-skpd', message: 'Data berhasil disimpan', type: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('error-skpd', message: 'Data gagal disimpan', type: 'error');
        }
    }
}
