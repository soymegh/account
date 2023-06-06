<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\OriginationRatesController;
use App\Http\Controllers\Admin\ResellerController;
use App\Http\Controllers\RateGroupController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->resource('origination-rates',OriginationRatesController::class);  

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->resource('rate-group',RateGroupController::class);  

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/reseller',[ResellerController::class, "index"])->name("reseller.index");  


/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resource('origination-rates', OriginationRatesController::class );
    
}); */
