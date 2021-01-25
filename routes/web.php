<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;

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
})->name('home-page');

Route::get('admin/login', [LoginController::class, 'getLogin'])->name('admin-login');
Route::post('admin/login', [LoginController::class, 'postLogin'])->name('admin-login');
Route::get('admin/logout', [LoginController::class, 'getLogout'])->name('admin-logout');

Route::group(['prefix'=>'admin', 'middleware' => 'adminLogin'],function(){
	Route::get('/', [TopController::class, 'home'])->name('admin');

	Route::group(['prefix'=>'user'],function(){
		Route::get('/', [UserController::class, 'index'])->name('user-index');

		Route::post('renew', [UserController::class, 'renew'])->name('user-renew');
		Route::post('dis-renew', [UserController::class, 'disrenew'])->name('user-dis-renew');
	});
});