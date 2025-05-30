<?php

namespace App\Livewire\Auth;

use App\Models\Skpd;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public int $id_skpd = 0;

    public $skpd;

    public function mount()
    {
        $this->skpd = Skpd::all();
    }

    /**
     * Handle an incoming registration request.
     */

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'id_skpd' => ['required', 'numeric'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // event(new Registered(($user = User::create($validated))));
        $user = User::create($validated);

        Skpd::where('id', $this->id_skpd)->update(['id_user' => $user->id]);

        // Auth::login($user);

        $user->assignRole('user');

        // $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
