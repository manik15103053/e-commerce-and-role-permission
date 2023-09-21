<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;










Route::get('/',[FrontendController::class,'index'])->name('index');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('guest:web')->group(function(){
        Route::get('login',[FrontendController::class,'login'])->name('login');
    });

    Route::middleware('auth:web')->group(function(){
        Route::get('/home',[FrontendController::class,'home'])->name('home');
    });

});

