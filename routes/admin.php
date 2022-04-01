<?php

/* Date: 2021/05/12
 * Time: 11:59 AM
 * File Name: superadmin.php
 */
use App\Http\Controllers\accounts\admin\DashboardController;
use App\Http\Controllers\accounts\admin\WorkshopController;
use App\Http\Controllers\accounts\admin\OpendayController;

Route::group(['prefix' => 'account/admin', 'middleware' => ['auth', 'App\Http\Middleware\Admin']], function () {

    //For Dashboard

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // user
    Route::get('activate-user/{email}', [DashboardController::class, 'activateUser'])->name('admin.activate');
    Route::get('delete-user/{id}', [DashboardController::class, 'deleteUser'])->name('admin.delete');
    Route::get('block-user/{email}', [DashboardController::class, 'blockUser'])->name('admin.block');
    
    // workshop
    Route::get('list-workshop', [WorkshopController::class, 'index'])->name('admin.list_workshop');
    Route::get('add-workshop', [WorkshopController::class, 'create'])->name('admin.create_workshop');
    Route::post('post/add-workshop', [WorkshopController::class, 'store'])->name('admin.store_workshop');
    
    //open day
    Route::get('list-open-day', [OpendayController::class, 'index'])->name('admin.list_openday');
    Route::get('add-open-day', [OpendayController::class, 'create'])->name('admin.create_openday');
    Route::post('post/add-open-day', [OpendayController::class, 'store'])->name('admin.store_openday');

    //appointement
    Route::get('list-appointement', [OpendayController::class, 'indexAppointement'])->name('admin.list_appointement');
    
   

});
