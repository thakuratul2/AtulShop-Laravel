<?php

use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//middleware groups

Route::group(['prefix' => 'admin'], function(){


    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login',[AdminLoginController::class,'AdminLogin'])->name('admin.login');
        Route::post('/authenticaye',[AdminLoginController::class,'AdminAuth'])->name('admin.auth');

    });

    Route::group(['middleware' => 'admin.auth'], function(){

    });
});