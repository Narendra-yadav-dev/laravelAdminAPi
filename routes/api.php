<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\PagesController;
use App\Http\Controllers\api\ProductsController;

Route::group(['middleware' => 'auth'], function () {
     
    //Route::get('/allcategories', [CategoryController::class, 'allcategories']);
    Route::get('/singlecategory/{id}', [CategoryController::class, 'singlecategory']);
    Route::get('/allpages', [PagesController::class, 'allpages']);
    Route::get('/singlepage/{id}', [PagesController::class, 'singlepage']);
   // Route::get('/allproducts', [ProductsController::class, 'allproducts']);
    Route::get('/singleproduct/{id}', [ProductsController::class, 'singleproduct']);

});

Route::controller(ProductsController::class)->group(function () {
    Route::get('allproducts', 'allproducts');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('allcategories', 'allcategories');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('user', 'user');
    Route::get('users', 'users');
});