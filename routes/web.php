<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard\Index as AdminDashboard;
use App\Livewire\Admin\Negara\Index as NegaraDashboard;
use App\Livewire\Admin\History\Index as HistoryDashboard;
use App\Livewire\Admin\ReportRegresi\Index as ReportRegresiDashboard;
use App\Livewire\Home\Landing\Index as HomeLanding;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeLanding::class)->name('home');

Route::group(['prefix' => '',  'namespace' => 'App\Livewire\Admin',  'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', AdminDashboard::class)->name('dashboard');

        Route::group(['prefix' => 'master-data'], function () {
            Route::group(['prefix' => 'negara'], function () {
                Route::get('/', NegaraDashboard::class)->name('admin.negara');
            });

            Route::group(['prefix' => 'history'], function () {
                Route::get('/', HistoryDashboard::class)->name('admin.history');
            });
        });

        Route::group(['prefix' => 'laporan'], function () {
            Route::group(['prefix' => 'regresi'], function () {
                Route::get('/', ReportRegresiDashboard::class)->name('admin.laporan.regresi');
            });
        });
    });
});

require __DIR__ . '/auth.php';
