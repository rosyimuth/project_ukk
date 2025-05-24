<?php

use App\Livewire\PKL\Index;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pkl\Index as PklIndex;
use App\Livewire\Pkl\Create as PklCreate;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check.roles',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pkl', PklIndex::class)->name('pkl.index');
    Route::get('/pkl/create', PklCreate::class)->name('pkl.create');
});
