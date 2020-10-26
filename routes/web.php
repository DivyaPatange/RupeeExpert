<?php

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
    return view('admin.login');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'register'])->name('register.submit');
    Route::get('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
    Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users.index');
    Route::get('/userSearch', [App\Http\Controllers\Admin\UsersController::class, 'search'])->name('users.search');
    Route::get('/userCreate', [App\Http\Controllers\Admin\UsersController::class, 'create'])->name('users.create');
    Route::post('/userStore', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('users.store');
    Route::get('/userEdit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('users.edit');
    Route::put('/userUpdate/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('users.update');
    Route::get('/userProfile/{id}', [App\Http\Controllers\Admin\UsersController::class, 'show'])->name('users.show');
    Route::get('/companytree', [App\Http\Controllers\Admin\UsersController::class, 'Treeview'])->name('companytree');
    Route::get('/dailyReport', [App\Http\Controllers\Admin\UsersController::class, 'dailyReport'])->name('dailyReport');
    Route::post('/uploadFile', [App\Http\Controllers\Admin\UsersController::class, 'uploadFile'])->name('uploadFile');

});
Route::get('/search', [App\Http\Controllers\Auth\RegisterController::class, 'search'])->name('user.search');
Route::prefix('users')->group(function() {
    
});

