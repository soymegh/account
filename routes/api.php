<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RateGroupApiController;
use App\Http\Controllers\api\OriginationRatesApiController;
use App\Http\Controllers\api\ResellerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/origination-rate/store', [OriginationRatesApiController::class, 'store'])->name('api.origination-rates.store');
Route::post('/origination-rate/update', [OriginationRatesApiController::class, 'update'])->name('api.origination-rates.update');
Route::post('/origination-rate/destroy', [OriginationRatesApiController::class, 'destroy'])->name('api.origination-rates.destroy');
Route::post('/origination-rate/change-status', [OriginationRatesApiController::class, 'change_status'])->name('api.origination-rates.change-status');

Route::post('/rate-group/store', [RateGroupApiController::class, 'store'])->name('api.rateGroup.store');
Route::post('/rate-group/update', [RateGroupApiController::class, 'update'])->name('api.rateGroup.update');
Route::post('/rate-group/destroy', [RateGroupApiController::class, 'destroy'])->name('api.rateGroup.destroy');
Route::post('/rate-group/change-status', [RateGroupApiController::class, 'change_status'])->name('api.rateGroup.change-status');

Route::get('/resellers', [ResellerController::class, 'index'])->name('api.reseller.get');
Route::post('/reseller/store', [ResellerController::class, 'store'])->name('api.reseller.store');
Route::post('/reseller/update', [ResellerController::class, 'update'])->name('api.reseller.update');
Route::post('/reseller/destroy', [ResellerController::class, 'destroy'])->name('api.reseller.destroy');
Route::post('/reseller/change-status', [ResellerController::class, 'change_status'])->name('api.reseller.change-status');