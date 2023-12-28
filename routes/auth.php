<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Logout;

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {
    route::get('logout', Logout::class)->name('logout');
});
