<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;







Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('login-check',[HomeController::class,'loginCheck'])->name('check-login');



Route::prefix('admin')->name('admin.')->group(function(){
   
    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home',[DashboardController::class,'index'])->name('home');
        Route::post('/logout',[HomeController::class,'logout'])->name('logout');


        //Role
        Route::prefix('roles')->name('role.')->group(function(){
            Route::get('/',[RoleController::class,'index'])->name('index');
            Route::get('/create',[RoleController::class,'create'])->name('create');
            Route::post('/store',[RoleController::class,'store'])->name('store');
            Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[RoleController::class,'update'])->name('update');
            Route::get('/delete/{id}',[RoleController::class,'delete'])->name('delete');
        });


        //Admin User
        Route::prefix('user')->name('user.')->group(function(){
            Route::get('/',[AdminController::class,'index'])->name('index');
            Route::get('/create',[AdminController::class,'create'])->name('create');
            Route::post('/store',[AdminController::class,'store'])->name('store');
            Route::get('/edit/{id}',[AdminController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[AdminController::class,'update'])->name('update');
            Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete');
        });
    });

});


