<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('plans', PlanController::class);