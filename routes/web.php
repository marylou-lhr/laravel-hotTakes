<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SauceController;

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

Auth::routes();

Route::get('/', function () {
    return view('sauces.index');
})->name('home');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate(); 
    session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::get('/sauces', [SauceController::class, 'index'])->name('sauces.index');
Route::get('/sauces/create', [SauceController::class, 'create'])->name('sauces.create');
Route::post('/sauces/store', [SauceController::class, 'store'])->name('sauces.store');
Route::get('/sauces/{id}', [SauceController::class, 'show'])->name('sauces.show');
Route::get('/sauces/edit/{id}', [SauceController::class, 'edit'])->name('sauces.edit');
Route::put('/sauces/update/{id}', [SauceController::class, 'update'])->name('sauces.update');
Route::delete('/sauces/destroy/{id}', [SauceController::class, 'destroy'])->name('sauces.destroy');