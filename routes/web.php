<?php

use Illuminate\Support\Facades\Route;
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
Route::group(['middleware'=> 'auth'], function() {//вызываем осредника проверяющего авторизацию
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');//выход
    Route::resource('staff', 'App\Http\Controllers\StaffController');//контроллер ресурса сотрудников
    Route::resource('company', 'App\Http\Controllers\CompanyController');//контроллер ресурса компаний

});
Route::group(['middleware'=> 'guest'], function() {//вызываем осредника проверяющего неавторизованного пользователя

Route::get('/register', [UserController::class, 'create'])->name('register.create');//форма регистрации
Route::post('/register', [UserController::class, 'store'])->name('register.store');//вызов контроллера регистрации

Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');//форма авторизации
Route::post('/login', [UserController::class, 'login'])->name('login');//вызов контроллера авторизации
Route::get('/{c?}/{f?}', function () {
    return  redirect()->Route('login.create');//если неавторизованный пользователь будет вводить урл то перенаправлять на логин
});
});

