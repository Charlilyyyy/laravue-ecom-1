<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthController;
// use App\Http\Middleware\AuthenticateDashboard;



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

Route::get('/',[HomeController::class,'index']);
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/handlelogin',[AuthController::class,'login']);
Route::get('/register',[HomeController::class,'register']);
Route::get('/logout', [AuthController::class, 'perform'])->name('logout');

// Route::middleware(['auth'])->group(function () {     
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth.dashboard');


