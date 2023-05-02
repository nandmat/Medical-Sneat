<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
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

//Auth
Route::prefix('/')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('auth.login.index');
    Route::post('/', [AuthController::class, 'auth'])->name('auth.login.auth');
    Route::get('/create', [AuthController::class, 'create'])->name('auth.login.create');
    Route::post('/create', [UserController::class, 'store'])->name('auth.login.register.store');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/assinaturas', [PlanController::class, 'index'])->name('dashboard.cards');
    Route::get('/assinaturas/{plan}', [PlanController::class, 'show'])->name('dashboard.cards.show');
    Route::post('/assinar', [PlanController::class, 'subscription'])->name('dashboard.cards.subscription');
});

//User
Route::get('/settings-account/{id}', [AuthController::class, 'pageAccountSettings'])->name('users.page.account.seetings');
Route::put('/update-account/{id}', [UserController::class, 'update'])->name('users.page.account.seetings.update');
Route::delete('/delete-account/{id}', [UserController::class, 'destroy'])->name('users.page.account.seetings.destroy');


//Rota fallback
Route::fallback(function(){
    return view('content.error');
})->name('fallback');
