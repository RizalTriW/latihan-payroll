<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OtentikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Konfigurasi\SetupController;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Auth;

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

// Authentication User

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/', [OtentikasiController::class, 'login'])->name('user-login');
// Route::get('/', [OtentikasiController::class, 'index'])->name('login');
Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login');

// Route::group(['middleware' => 'CheckLogin'], function () {
Route::group(['middleware' => 'auth'], function () {
//Crud Database
Route::get('data', [CrudController::class, 'index'])->name('data');
Route::get('data/tambah', [CrudController::class, 'create'])->name('create-data');
Route::post('data', [CrudController::class, 'save'])->name('save-data');
Route::delete('data/delete/{id}', [CrudController::class, 'delete'])->name('delete-data'); 
Route::get('data/{id}/edit', [CrudController::class, 'edit'])->name('edit-data');
Route::patch('data/{id}', [CrudController::class, 'update'])->name('update-data');

//Dashboard
Route::get('/dashboard', function () { return view('index');});

//MENU
Route::resource('/konfigurasi/setup', 'App\Http\Controllers\Konfigurasi\SetupController');

// Authentication user
Route::get('/logout', [OtentikasiController::class, 'logout'])->name('logout');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
