<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'getLoginForm']);
Route::post('/login', [AuthController::class, 'postLoginForm'])->name('login');
Route::get('/test', [TestController::class, 'index']);
Route::post('/test/city/store', [TestController::class, 'postFormStore'])->name('post.form.store');
Route::get('/test/city/edit/{id}', [TestController::class, 'edit']);
Route::post('/test/city/update', [TestController::class, 'postFormUpdate'])->name('post.form.update');
Route::get('/test/city/delete/{id}', [TestController::class, 'delete']);

Route::get('/setting', [SettingController::class, 'index']);
