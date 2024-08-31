<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Main home route
Route::get('/', [BoardingHouseController::class,'index'])->name('bh.home');

// Boarding House Routes
Route::get('/landing', [BoardingHouseController::class,'all'])->name('bh.all');
Route::post('/boardingHouse', [BoardingHouseController::class, 'store'])->name('bh.store');
Route::get('/boardingHouse/{id}', [BoardingHouseController::class, 'show'])->name('bh.show');

// Property List Routes
Route::get('/property-list', [BoardingHouseController::class, 'propertyList'])->name('property.list'); 
Route::post('/property-list', [BoardingHouseController::class, 'storeProperty'])->name('property.store');


Route::get('/account/login', [LoginController::class,'index'])->name('account.login');
Route::get('/account/register', [LoginController::class,'register'])->name('account.register');
Route::post('/account/process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
Route::get('/account/logout', [LoginController::class,'logout'])->name('account.logout');
Route::post('/account/authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/dashboard', [DashboardController::class,'index'])->name('account.dashboard');

// Reserve route, protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::post('/reserve/{boardingHouse}', [BoardingHouseController::class, 'reserve'])->name('reserve');
});
