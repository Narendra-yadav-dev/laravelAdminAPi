<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\LearnController;
use App\Http\Controllers\Admin\WeekController;
use App\Http\Controllers\Admin\ProductsController;

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
 
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/logout', [AdminAuthController::class, 'adminLogout']);
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('adminDashboard');
        Route::get('/users', [UsersController::class, 'index']);
        Route::get('/userprofile', [UsersController::class, 'userProfile'])->name('user/userProfile'); 
        Route::put('/updateprofile', [UsersController::class, 'updateprofile']); 
        Route::put('/updatepassword', [UsersController::class, 'updatepassword']); 
        Route::get('/adduser', [UsersController::class, 'adduser'])->name('adduser'); 
        Route::post('/createuser', [UsersController::class, 'createuser'])->name('createuser'); 
        Route::get('/edituser/{id}', [UsersController::class, 'edituser'])->name('edituser'); 
        Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete'); 
        Route::put('/updateuser/{id}', [UsersController::class, 'updateuser'])->name('updateuser'); 
        Route::get('/category', [CategoryController::class, 'index'])->name('category'); 
        Route::get('/addcategory', [CategoryController::class, 'addcategory'])->name('addcategory'); 
        Route::post('/createCategory', [CategoryController::class, 'createCategory'])->name('createCategory'); 
        Route::get('/editcategory/{id}', [CategoryController::class, 'editcategory'])->name('editcategory'); 
        Route::put('/updatecategory/{id}', [CategoryController::class, 'updatecategory']);
        Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        
        Route::get('/pages', [PagesController::class, 'index']);
        Route::get('/addpage', [PagesController::class, 'addpage'])->name('addpage'); 
        Route::post('/createpage', [PagesController::class, 'createpage'])->name('createpage');
        Route::get('/editpage/{id}', [PagesController::class, 'editpage'])->name('editpage'); 
        Route::get('/viewpage/{id}', [PagesController::class, 'viewpage'])->name('viewpage'); 
        Route::get('/deletepage/{id}', [PagesController::class, 'deletepage'])->name('deletepage'); 
        Route::put('/updatepage/{id}', [PagesController::class, 'updatepage'])->name('updatepage'); 

        // learn url

        Route::get('/learn', [LearnController::class, 'index']);
        Route::get('/addlearn', [LearnController::class, 'addlearn'])->name('addlearn'); 
        Route::post('/createlearn', [LearnController::class, 'createlearn'])->name('createlearn');
        Route::get('/editlearn/{id}', [LearnController::class, 'editlearn'])->name('editlearn'); 
        Route::get('/viewlearn/{id}', [LearnController::class, 'viewlearn'])->name('viewlearn'); 
        Route::get('/deletelearn/{id}', [LearnController::class, 'deletelearn'])->name('deletelearn'); 
        Route::put('/updatelearn/{id}', [LearnController::class, 'updatelearn'])->name('updatelearn');

        // Weeks url

        Route::get('/weeks', [WeekController::class, 'index']);
        Route::get('/addweek', [WeekController::class, 'addweek'])->name('addweek'); 
        Route::post('/createweek', [WeekController::class, 'createweek'])->name('createweek');
        Route::get('/editweek/{id}', [WeekController::class, 'editweek'])->name('editweek'); 
        Route::get('/viewweek/{id}', [WeekController::class, 'viewweek'])->name('viewweek'); 
        Route::get('/deleteweek/{id}', [WeekController::class, 'deleteweek'])->name('deleteweek'); 
        Route::put('/updateweek/{id}', [WeekController::class, 'updateweek'])->name('updateweek');

        // Products url

        Route::get('/products', [ProductsController::class, 'index']);
        Route::get('/addproduct', [ProductsController::class, 'addproduct'])->name('addproduct'); 
        Route::post('/createproduct', [ProductsController::class, 'createproduct'])->name('createproduct');
        Route::get('/editproduct/{id}', [ProductsController::class, 'editproduct'])->name('editproduct'); 
        Route::get('/viewproduct/{id}', [ProductsController::class, 'viewproduct'])->name('viewproduct'); 
        Route::get('/deleteproduct/{id}', [ProductsController::class, 'deleteproduct'])->name('deleteproduct'); 
        Route::put('/updateproduct/{id}', [ProductsController::class, 'updateproduct'])->name('updateproduct');
        
    });
});
