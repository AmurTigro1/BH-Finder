<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\landlord\LoginController as LandLordLoginController;
use App\Http\Controllers\landlord\DashboardController as LandLordDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyListController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'account'], function(){

   Route::group(['middleware' => 'guest'],function(){
        Route::get('login', [LoginController::class,'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.register');
        Route::post('process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');

   });
    Route::group(['middleware' => 'auth'],function(){
        Route::get('logout', [LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class,'index'])->name('account.dashboard');   
        Route::get('/landing', [DashboardController::class,'all'])->name('user-bh.all');
        Route::get('/', [BoardingHouseController::class,'index'])->name('user-bh.home');
        Route::get('/boardingHouse/{id}', [DashboardController::class, 'show'])->name('user-bh.show');
        Route::get('/room/{id}', [DashboardController::class, 'showRoom'])->name('user-room.show');
        Route::post('/reserve_room/{id}', [DashboardController::class, 'reserve'])->name('user-room.reserve');





    });
});

//ADMIN 
Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('login', [AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
     Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class,'logout'])->name('admin.logout');
        
     });
 });
 Route::get('/landLord/login', [LandLordLoginController::class,'index'])->name('landlord.login');
 Route::get('/landLord/dashboard', [LandLordDashboardController::class,'index'])->name('landlord.dashboard');
 Route::post('/landlord/authenticate', [LandLordLoginController::class,'authenticate'])->name('landlord.authenticate');






Route::get('/', [BoardingHouseController::class,'index'])->name('bh.home');
Route::get('/landing', [BoardingHouseController::class,'all'])->name('bh.all');
Route::post('/boardingHouse', [BoardingHouseController::class, 'store'])->name('bh.store');
Route::get('/boardingHouse/{id}', [BoardingHouseController::class, 'show'])->name('bh.show');

//signUp to reserve
Route::get('/signUp/{id}', [DashboardController::class,'signUp'])->name('user-room.signUp');

//room
Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');
Route::get('/room/{id}/modal', [RoomController::class, 'showModal'])->name('room.modal');
Route::post('/reserve_room/{id}', [RoomController::class, 'reserve'])->name('room.reserve');

//PropertyList -- to add property
Route::get('/property-list', [PropertyListController::class, 'index'])->name('property.list'); 
Route::post('/property-list', [PropertyListController::class, 'store'])->name('property.store');
