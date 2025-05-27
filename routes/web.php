<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\PKL\Index as PklIndex;
use App\Livewire\PKL\Create as PklCreate;
use App\Livewire\PKL\Show as PklShow;
use App\Livewire\PKL\Edit as PklEdit;
use App\Livewire\Industri\Index as IndustriIndex;
use App\Livewire\Industri\Create as IndustriCreate;
use App\Livewire\Industri\Show as IndustriShow;
use App\Livewire\Industri\Edit as IndustriEdit;
use App\Livewire\Guru\Index as GuruIndex;
use App\Livewire\Guru\Create as GuruCreate;
use App\Livewire\Guru\Show as GuruShow;
use App\Livewire\Guru\Edit as GuruEdit;
use App\Livewire\Siswa\Index as SiswaIndex;
use App\Livewire\Siswa\Create as SiswaCreate;
use App\Livewire\Siswa\Show as SiswaShow;
use App\Livewire\Siswa\Edit as SiswaEdit;

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
    Route::get('/pkl/show/{id}', PklShow::class)->name('pkl.show');
    Route::get('/pkl/edit/{id}', PklEdit::class)->name('pkl.edit');

    Route::get('/industri', IndustriIndex::class)->name('industri.index');
    Route::get('/industri/create', IndustriCreate::class)->name('industri.create');
    Route::get('/industri/show/{id}', IndustriShow::class)->name('industri.show');
    Route::get('/industri/edit/{id}', IndustriEdit::class)->name('industri.edit');


    Route::get('/guru', GuruIndex::class)->name('guru.index');
    Route::get('/guru/create', GuruCreate::class)->name('guru.create');
    Route::get('/guru/show/{id}', GuruShow::class)->name('guru.show');
    Route::get('/guru/edit/{id}', GuruEdit::class)->name('guru.edit');

    Route::get('/siswa', SiswaIndex::class)->name('siswa.index');
    Route::get('/siswa/create', SiswaCreate::class)->name('siswa.create');
    Route::get('/siswa/show/{id}', SiswaShow::class)->name('siswa.show');
    Route::get('/siswa/edit/{id}', SiswaEdit::class)->name('siswa.edit');

});
