<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('sign-in-to-start-your-session', [HomeController::class, 'login'])->name('user.login');
Route::post('login/doLogin', [HomeController::class, 'doLogin'])->name('loginAction');
Route::get('sign-out', [HomeController::class, 'doLogout'])->name('account.logout');
    
//Route::get('register', ['uses' => 'HomeController@registerForm', 'as' => 'registerForm' ]);
//Route::post('post-register', ['uses' => 'HomeController@register', 'as' => 'register' ]);
//Route::get('sign-out', ['uses' => 'HomeController@doLogout', 'as' => 'account.logout' ]);
//Route::post('login/doLogin',['as' => 'loginAction', 'uses' =>'HomeController@doLogin'])->name('');
//Route::get('access',['as' => 'access', 'uses' =>'HomeController@access']);


require __DIR__.'/auth.php';


