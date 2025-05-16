<?php

namespace App\Livewire\Skbd;

use App\Models\User;
use Livewire\Component;

class Karyawan extends Component
{
    public $users = [];
    public function mount()
    {
        $this->users = User::with('roles')->get();
    }
    public function render()
    {
        return view('livewire.skbd.karyawan');
    }
}
