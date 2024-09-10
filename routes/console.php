<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    DB::table('dashboard_data')->insert([
        'urrent_users' => 0,
        'active_users' => 0,
        'suspended_users' => 0,
        'users_access' => 0
    ]);
})->daily();
