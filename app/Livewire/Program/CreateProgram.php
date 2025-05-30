<?php

namespace App\Livewire\Program;

use App\Livewire\Forms\ProgramForm;
use App\Models\Skpd;
use Livewire\Component;

class CreateProgram extends Component
{
    public ProgramForm $form;
    public $skpd = [];

    public function mount()
    {
        $this->skpd = Skpd::all();
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

    public function render()
    {
        $this->skpd = Skpd::all();
        return view('livewire.program.create-program', [
            'skpd' => $this->skpd
        ]);
    }
}
