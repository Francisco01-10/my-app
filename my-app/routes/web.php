<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\CreateDomain;

Route::get('/', function () {
    return view('welcome');
})->name('home');

#Route::get('/create-domain', CreateDomain::class)->name('create-domain');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('domains', 'domains')
    ->middleware(['auth', 'verified'])
    ->name('domains');

Route::view('userslogs', 'userslogs')
    ->middleware(['auth', 'verified'])
    ->name('userslogs');

Route::view('add-domains', 'add-domains')
    ->middleware(['auth', 'verified'])
    ->name('add-domains');

Route::view('update', 'update')
    ->middleware(['auth', 'verified'])
    ->name('update');

Route::view('remove-domains', 'remove-domains')
    ->middleware(['auth', 'verified'])
    ->name('remove-domains');

Route::view('add-users-logs', 'add-users-logs')
    ->middleware(['auth', 'verified'])
    ->name('add-users-logs');

Route::view('add-user-log-importer', 'add-user-log-importer')
    ->middleware(['auth', 'verified'])
    ->name('add-user-log-importer');

Route::view('remove-user-log', 'remove-user-log')
    ->middleware(['auth', 'verified'])
    ->name('remove-user-log');

Route::view('update-user', 'update-user')
    ->middleware(['auth', 'verified'])
    ->name('update-user');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



require __DIR__ . '/auth.php';
