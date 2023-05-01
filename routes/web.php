<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Office\OfficeAuthController;
use App\Http\Controllers\Office\OfficeHomeController;
use App\Http\Controllers\Office\OfficeReportController;
use App\Http\Controllers\Office\OfficeRiderController;
use App\Models\RiderShift;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Crypt;
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

        Route::prefix('report')->name('report.')->group(function () {
            Route::get('shift', [OfficeReportController::class, 'ReportList'])->name('shift.list');
            Route::post('shift', [OfficeReportController::class, 'ReportList'])->name('shift.list');

            Route::get('order', [OfficeReportController::class, 'ReportList'])->name('order.list');
            Route::post('order', [OfficeReportController::class, 'ReportList'])->name('ordet.list');

            Route::get('accept', [OfficeReportController::class, 'ReportList'])->name('accept.list');
            Route::post('accept', [OfficeReportController::class, 'ReportList'])->name('accept.list');

            Route::get('absence', [OfficeReportController::class, 'ReportList'])->name('absence.list');
            Route::post('absence', [OfficeReportController::class, 'ReportList'])->name('absence.list');

            Route::get('accident', [OfficeReportController::class, 'ReportList'])->name('accident.list');
            Route::post('accident', [OfficeReportController::class, 'ReportList'])->name('accident.list');

            Route::get('annual', [OfficeReportController::class, 'ReportList'])->name('annual.list');
            Route::post('annual', [OfficeReportController::class, 'ReportList'])->name('annual.list');

            Route::get('bonus', [OfficeReportController::class, 'ReportList'])->name('bonus.list');
            Route::post('bonus', [OfficeReportController::class, 'ReportList'])->name('bonus.list');

            Route::get('break', [OfficeReportController::class, 'ReportList'])->name('break.list');
            Route::post('break', [OfficeReportController::class, 'ReportList'])->name('break.list');

            Route::get('late', [OfficeReportController::class, 'ReportList'])->name('late.list');
            Route::post('late', [OfficeReportController::class, 'ReportList'])->name('late.list');

            Route::get('feedback', [OfficeReportController::class, 'ReportList'])->name('feedback.list');
            Route::post('feedback', [OfficeReportController::class, 'ReportList'])->name('feedback.list');
        });
    });
});

Route::get('/test', function () {
    // $STR = 'Mosad Love Koky More';
    // $STR = Crypt::encryptString($STR);
    // // return var_dump($STR);
    // $STR = Crypt::decryptString('eyJpdiI6InlsMW42dWVWaWJBQ3JDTkF6SkNSS3c9PSIsInZhbHVlIjoiMCtoYjJOcHcrOFpWQk1FR05HU0M3NnI2SUFxSXJHdWRMWjVHaEZOSnpXTT0iLCJtYWMiOiIwYzYwYjIwN2RmNDJlYjM0NDZlYzRiNzYxNDRhYTgzNzk5MjIxYTZmNjg4ODM4ZTE4NWY2N2M2MGE5ZGJmMmRhIiwidGFnIjoiIn0');
    // return $STR;
});
