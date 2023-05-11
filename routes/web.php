<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\AfterLoginCheck;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

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

// landing page
Route::view('/', 'contents.index')->middleware(AfterLoginCheck::class);

// direct to register page
Route::view('/register', 'contents.register')->middleware(AfterLoginCheck::class);

// direct to login page
Route::view('/login', 'contents.login')->middleware(AfterLoginCheck::class);

// create user
Route::post('/register/createUser', [UserController::class, 'createUser'])->middleware(AfterLoginCheck::class);

// login auth
Route::post('/login/Auth', [UserController::class, 'loginAuth'])->middleware(AfterLoginCheck::class);

// logout
Route::get('/logout', [UserController::class, 'logout'])->middleware(LoginCheck::class);

// home
Route::get('/home', [ItemController::class, 'home'])->middleware(LoginCheck::class);

// item detail
Route::get('/item/{id}/detail', [ItemController::class, 'itemDetail'])->middleware(LoginCheck::class);

// add item to cart
Route::get('/addingcart/{id}', [OrderController::class, 'addItemToCart'])->middleware(LoginCheck::class);

// cart view based on user
Route::get('/cart', [OrderController::class, 'cartView'])->middleware(LoginCheck::class);
// delete order
Route::get('/order/{id}/delete', [OrderController::class, 'deleteOrder'])->middleware(LoginCheck::class);
// check out
Route::get('/checkOut', [OrderController::class, 'cartCheckOut'])->middleware(LoginCheck::class);

// account main
Route::get('/accountMaintenance', [UserController::class, 'accountMaintenance'])->middleware(LoginCheck::class);

// delete user or admin
Route::get('/deleteUserAdmin/{id}', [UserController::class, 'deleteUserAdmin'])->middleware(LoginCheck::class);

// update role page
Route::get('/updateRolePage/{id}', [UserController::class, 'updateRolePage'])->middleware(LoginCheck::class);
Route::post('/updateRole/{id}', [UserController::class, 'updateRole'])->middleware(LoginCheck::class);

// profile page
Route::get('/profile', [UserController::class, 'profilePage'])->middleware(LoginCheck::class);
Route::post('/updateProfile', [UserController::class, 'updateProfile'])->middleware(LoginCheck::class);
