<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NhacSiController;
use App\Http\Controllers\NhacsiController2;
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
Route::get('/', function(){
    return view('welcome');
});
// Route::get('/', [NhacSiController::class,'list'])->name('nhacsi.list');
// Route::get('/{id}', [NhacSiController::class,'detail'])->name('nhacsi.detail');
// Route::get('/xoa/{id}', [NhacSiController::class,'delete'])->name('nhacsi.delete');

// Route::get('nhacsi', [NhacsiController2::class, 'index'])->name('nhacsi.index');
// Route::get('nhacsi/create', [NhacsiController2::class, 'create'])->name('nhacsi.create');
// Route::get('nhacsi/{id}/show', [NhacsiController2::class, 'show'])->name('nhacsi.show');
// Route::get('nhacsi/{id}/edit', [NhacsiController2::class, 'edit'])->name('nhacsi.edit');
// Route::post('nhacsi/store', [NhacsiController2::class, 'store'])->name('nhacsi.store');
// Route::put('nhacsi/{id}/update', [NhacsiController2::class, 'update'])->name('nhacsi.update');
// Route::delete('nhacsi/{id}/destroy', [NhacsiController2::class, 'destroy'])->name('nhacsi.destroy');

//Route resource
Route::resource('books',BookController::class);

// LOGIN
Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');
Route::get('auth/logout', [LoginController::class, 'logout'])->name('logout');


// REGISTER
Route::get('auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register'])->name('register');

Route::get('admin', function(){
    return 'day la admin';
})->middleware(['auth','isAdmin']);