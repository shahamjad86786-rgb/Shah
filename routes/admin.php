<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');


    Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
        Route::get('/', [ClientsController::class, 'index'])->name('index');
        Route::get('/create', [ClientsController::class, 'create'])->name('create');
        Route::post('/store', [ClientsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ClientsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ClientsController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ClientsController::class, 'delete'])->name('delete');
    });
});