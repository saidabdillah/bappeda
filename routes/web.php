<?php

use App\Livewire\Program\CreateProgram;
use App\Livewire\Skpd\Entry;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::prefix('matriks')->group(function () {
        Route::group(['middleware' => ['role:admin|user']], function () {
            Route::view('', 'matrik')->name('matriks.index');
            Route::View('create', 'create-matrik')->name('matriks.create');
        });
    });

    Route::prefix('skpd')->group(function () {
        Route::get('create', Entry::class)->name('entry.create')->middleware('role:admin');
    });

    Route::prefix('program')->group(function () {
        Route::get('create', CreateProgram::class)->name('program.create')->middleware('role:admin');
    });

    Route::view('users', 'users')->name('users')->middleware('role:admin');


    // Route::redirect('settings', 'settings/profile');

    // Route::get('settings/profile', Profile::class)->name('settings.profile');
    // Route::get('settings/password', Password::class)->name('settings.password');
    // Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
