<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Hobby\HobbyController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/login', [AuthController::class, 'getLoginForm']);
// Route::get('/logout', [AuthController::class, 'getLogoutForm']);
// Route::post('/login', [AuthController::class, 'postLoginForm'])->name('login');

// Route::group(['prefix' => '/', 'middleware' => 'admin'], function () {
//     Route::get('/test', [TestController::class, 'index']);
//     Route::post('/test/city/store', [TestController::class, 'postFormStore'])->name('post.form.store');
//     Route::get('/test/city/edit/{id}', [TestController::class, 'edit']);
//     Route::post('/test/city/update', [TestController::class, 'postFormUpdate'])->name('post.form.update');
//     Route::get('/test/city/delete/{id}', [TestController::class, 'delete']);
// });
// Route::get('/setting', [SettingController::class, 'index']);
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin-backend/login', [AuthController::class, 'adminLoginForm']);
Route::get('/admin-backend/logout', [AuthController::class, 'adminLogout']);
Route::post('/admin-backend/login', [AuthController::class, 'postAdminLogin'])->name("admin.login");
Route::get('/test', [MailController::class, 'index']);
Route::get('/register', [MemberController::class, 'register']);
Route::post('/register', [MemberController::class, 'postRegister'])->name('register');
Route::get('/login', [MemberController::class, 'login']);
Route::post('/login', [MemberController::class, 'postLogin'])->name('login');
Route::post('/api/register', [MemberController::class, 'apiRegister']);
Route::get('/api/cities', [MemberController::class, 'apiGetCities']);
Route::get('/api/hobbies', [MemberController::class, 'apiGetHobbies']);
Route::group(['prefix' => '/admin-backend/' , 'middleware' => 'admin'], function () {
    Route::get('index', [DashboardController::class, 'index']);
    Route::group(['prefix' => 'city'], function () {
        Route::get('/index', [CityController::class, 'index']);
        Route::get('/create', [CityController::class, 'create']);
        Route::post('/store', [CityController::class, 'store'])->name('city.store');
        Route::get('/edit/{id}', [CityController::class, 'edit']);
        Route::post('/update', [CityController::class, 'update'])->name('city.update');
    });    
    Route::group(['prefix' => 'hobby'], function () {
        Route::get('/index', [HobbyController::class, 'index']);
        Route::get('/create', [HobbyController::class, 'create']);
        Route::post('/store', [HobbyController::class, 'store'])->name('hobby.store');
        Route::get('/edit/{id}', [HobbyController::class, 'edit']);
        Route::post('/update', [HobbyController::class, 'update'])->name('hobby.update');
    });   
    Route::group(['prefix' => 'user'], function(){
        Route::get('/index', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/password/edit/{id}', [UserController::class, 'editPassword']);
        Route::post('/update', [UserController::class, 'update'])->name('user.update');

    });
    Route::group(['prefix' => 'setting'], function(){
        Route::get('/index', [SettingController::class, 'index']);
        Route::get('/edit', [SettingController::class, 'edit']);
        Route::post('/update', [SettingController::class, 'update'])->name('setting.update');

    });
});
