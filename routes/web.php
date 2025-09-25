<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Laporan;
use App\Livewire\Umum\Profile;
use App\Livewire\User\CreateLaporan;
use App\Livewire\User\DashboardUser;
use App\Livewire\User\EditLaporan;
use App\Livewire\User\LaporanUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('components.layouts.app');
// });

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', Home::class)->name('dashboard');
    Route::get('/laporan', Laporan::class)->name('laporan');
});

Route::prefix('user')->middleware(['auth', 'user'])->name('user.')->group(function () {
    Route::get('/', DashboardUser::class)->name('dashboard');
    Route::get('/laporan', LaporanUser::class)->name('laporan');
    Route::get('/laporan/new', CreateLaporan::class)->name('laporan.create');
    Route::get('/laporan/{id}/edit', EditLaporan::class)->name('laporan.edit');
    Route::get('/my-profile', Profile::class)->name('profile');
});

Route::get('/auth/start-session', Login::class)->name('login')->middleware('guest');
Route::get('/auth/register', Register::class)->name('register')->middleware('guest');


// Route::get('/home', Home::class)->name('home');
// Route::get('/laporan', Laporan::class)->name('laporan');
