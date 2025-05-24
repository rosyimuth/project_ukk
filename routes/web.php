<?php

use App\Livewire\PKL\Index;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\PKL\Create as PKLCreate;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'role:siswa'])
    ->name('dashboard');

Route::get('/pkl', Index::class)
    ->middleware(['auth', 'verified', 'role:siswa'])
    ->name('pkl');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    // Route::get('/pkl/create', PKLCreate::class)->name('pkl.create');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
