<?php

namespace App\Livewire\Skpd;

use App\Livewire\Forms\SkpdForm;
use App\Models\User;
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
            $this->dispatch('notif', message: 'Data berhasil disimpan', type: 'success', title: 'Berhasil');
        } catch (\Throwable $e) {
            $this->dispatch('notif', message: $e->getMessage(), type: 'error', title: 'Gagal');
        }
    }
}
