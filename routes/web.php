<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSubCategory;
use App\Http\Controllers\Admin\SubCategoryController;
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
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.delete');
Route::post('/category-images',[ImagesController::class,'store'])->name('temp-images.create');



//Sub Categories
Route::get('/sub-categories',[SubCategoryController::class,'SubCategory'])->name('subcat.view');
Route::get('/sub-categories/create',[SubCategoryController::class,'create'])->name('subcat.create');
Route::post('/sub-categories',[SubCategoryController::class,'store'])->name('subcat.show');
Route::get('/sub-categories/{subCategory}/edit',[SubCategoryController::class,'edit'])->name('subcat.edit');
Route::put('/sub-categories/{subCategory}',[SubCategoryController::class,'update'])->name('subcat.update');
Route::delete('/sub-categories/{subCategory}',[SubCategoryController::class,'destroy'])->name('subcat.delete');


//Brands
Route::get('/brands',[BrandsController::class,'Brands'])->name('brands.view');
Route::get('/brands/create',[BrandsController::class,'create'])->name('brands.create');
Route::post('/brands',[BrandsController::class,'store'])->name('brands.show');
Route::get('/brands/{brands}/edit',[BrandsController::class,'edit'])->name('brands.edit');
Route::put('/brands/{brands}',[BrandsController::class,'update'])->name('brands.update');
Route::delete('/brands/{brands}',[BrandsController::class,'destroy'])->name('brands.delete');


//Products
Route::get('/products',[ProductController::class,'Product'])->name('product.view');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{products}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/products/{products}',[ProductController::class,'update'])->name('product.update');



//SubCategory
Route::get('/product-subcategories',[ProductSubCategory::class,'ProductSubCategory'])->name('productsub.view');




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