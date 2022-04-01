<?php

/* Date: 2021/05/12
 * Time: 11:59 AM
 * File Name: superadmin.php
 */
use App\Http\Controllers\accounts\user\DashboardController;
use App\Http\Controllers\accounts\user\AppointementController;

Route::group(['prefix' => 'account/user', 'middleware' => ['auth', 'App\Http\Middleware\User']], function () {

    //For Dashboard

    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    
    // appointement
    Route::get('list-appointement', [AppointementController::class, 'index'])->name('user.list_appointement');
    Route::get('create-appointement/{workshop}', [AppointementController::class, 'create'])->name('user.create_appointement');
    Route::post('post/appointement', [AppointementController::class, 'store'])->name('user.store_appointement');

    
   

});
