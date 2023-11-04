<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\UserManagementController;
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
        Route::post('/authenticate',[AdminLoginController::class,'AdminAuth'])->name('admin.auth');

    });

    Route::group(['middleware' => 'admin.auth'], function(){
Route::get('/dashboard',[DasboardController::class,'Dashboard'])->name('admin.dashboard');

Route::get('/logout',[DasboardController::class,'logout'])->name('admin.logout');


//categoires routes
Route::get('/categories',[CategoryController::class,'CategoryView'])->name('admin.category');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoryController::class,'store'])->name('admin.show');

Route::post('/category-images',[ImagesController::class,'store'])->name('temp-images.create');


//slug
// Route::get('/GetSlug', function(Request $request){

//     $slug = '';
//     if(!empty($request->title)){
//         $slug = Str::slug($request->title);
//     }
//     return response()->json([
//         'status' => true,
//         'slug' => $slug
//     ]);
// })->name('getSlug');

    });
});