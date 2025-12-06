<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

    


    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ClientsController::class, 'index'])->name('index');
    });

});
