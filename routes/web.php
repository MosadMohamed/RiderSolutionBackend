<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Office\OfficeAuthController;
use App\Http\Controllers\Office\OfficeHomeController;
use App\Http\Controllers\Office\OfficeRiderController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'AdminLogin'])->name('login');
        Route::post('login', [AuthController::class, 'AdminLoginSubmit'])->name('login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'AdminLogout'])->name('logout');
        // 
        Route::get('home', [HomeController::class, 'AdminHome'])->name('home');

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('list', [AdminController::class, 'AdminList'])->name('list');
            Route::get('add', [AdminController::class, 'AdminAdd'])->name('add');
            Route::post('store', [AdminController::class, 'AdminStore'])->name('store');
            Route::get('edit/{user}', [AdminController::class, 'AdminEdit'])->name('edit');
            Route::post('update/{user}', [AdminController::class, 'AdminUpdate'])->name('update');
            Route::post('active/{user}', [AdminController::class, 'AdminActive'])->name('active');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Office Routes
|--------------------------------------------------------------------------
*/
Route::prefix('office')->name('office.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('office.login');
    });

    Route::middleware('guest:office')->group(function () {
        Route::get('login', [OfficeAuthController::class, 'OfficeLogin'])->name('login');
        Route::post('login', [OfficeAuthController::class, 'OfficeLoginSubmit'])->name('login.submit');
    });

    Route::middleware('auth:office')->group(function () {
        Route::post('logout', [OfficeAuthController::class, 'OfficeLogout'])->name('logout');
        // 
        Route::get('home', [OfficeHomeController::class, 'OfficeHome'])->name('home');

        Route::prefix('rider')->name('rider.')->group(function () {
            Route::get('list', [OfficeRiderController::class, 'RiderList'])->name('list');
            Route::get('add', [OfficeRiderController::class, 'RiderAdd'])->name('add');
            Route::post('store', [OfficeRiderController::class, 'RiderStore'])->name('store');
            Route::post('delete/{user}', [OfficeRiderController::class, 'RiderActive'])->name('delete');
        });
    });
});
