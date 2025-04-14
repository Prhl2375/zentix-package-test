<?php

use Illuminate\Support\Facades\Route;
use Prhl2375\ZentixPackageTest\Http\Controllers\ContactController;

Route::group([
    'prefix' => config('zentixpackage.route_prefix', 'contacts'),
    'namespace' => 'Prhl2375\ZentixPackageTest\Http\Controllers',
    'middleware' => ['web'],
], function () {
    Route::get('/',
        [ContactController::class, 'index'])
        ->name('zentixpackage.index');
    Route::post('/',
        [ContactController::class, 'store'])
        ->name('zentixpackage.store');
    Route::delete('/{id}',
        [ContactController::class, 'destroy'])
        ->name('zentixpackage.destroy');
});
