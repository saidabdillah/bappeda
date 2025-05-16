<?php

use App\Exports\MatrikExport;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Skbd\Karyawan;
use App\Livewire\AdminCreate\Matriks;
use App\Livewire\AdminCreate\CreateMatriks;
use App\Livewire\Skpd\Entry;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return redirect('login');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('skbd')->group(function () {
        Route::get('matriks', Matriks::class)->name('matriks.index');
        Route::get('matriks/create', CreateMatriks::class)->name('matriks.create');
        Route::get('karyawan', Karyawan::class)->name('karyawan.index');
        Route::get('entry', Entry::class)->name('entry.create');
        Route::post('entry', Entry::class)->name('entry.create');

        Route::get('matriks/export', function () {
            return Excel::download(new MatrikExport, 'matrik.xlsx');
        })->name('matrik.export');
    });


    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
