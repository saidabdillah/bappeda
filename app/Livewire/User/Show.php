<?php

namespace App\Livewire\User;

use App\Models\Skpd;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;

use Livewire\Component;

class Show extends Component
{

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public $id_skpd;

    public $skpd;


    public function render()
    {
        return view('livewire.user.show');
    }

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'id_skpd' => ['required', 'numeric'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $user->assignRole('user');
        $this->modal('add-user')->close();
        $this->reset();
        $this->dispatch('notif', message: 'User berhasil dibuat', type: 'success', title: 'Berhasil');
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'id_skpd.required' => 'SKPD wajib dipilih',
        ];
    }
}
