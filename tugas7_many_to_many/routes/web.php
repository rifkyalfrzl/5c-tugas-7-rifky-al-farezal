<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\OrangController;
use Illuminate\Support\Facades\Route;


Route::resource('orang', OrangController::class);
Route::resource('bank', BankController::class);
Route::resource('/', BankController::class);


Route::prefix('orang')->group(function(){
    Route::get('/take/{orang}', [OrangController::class, 'take'])->name('orangs.take');
    Route::post('/take/{orang}', [OrangController::class, 'takeStore'])->name('orangs.takeStore');
});

