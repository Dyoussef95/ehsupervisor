<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])
->name('index');

/*Route::get('/', function () {
    return view('dashboard.index');
})->name('index');*/

Route::resource('plans', PlanController::class);
Route::resource('clients', ClientController::class);
Route::resource('clients.connections', ConnectionController::class);

/*Route::get('/clients/{client}/connections', [ConnectionController::class, 'index'])
->name('connectios.index');
Route::get('/clients/{client}/connections/create', [ConnectionController::class, 'create'])
->name('connectios.create');
Route::post('/clients/{client}/connections', [ConnectionController::class, 'store'])
->name('connectios.store');
Route::get('/clients/{client}/connections/{connection}', [ConnectionController::class, 'show'])
->name('connectios.show');
Route::get('/clients/{client}/connections/{connection}/edit', [ConnectionController::class, 'edit'])
->name('connectios.edit');*/