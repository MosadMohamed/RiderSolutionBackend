<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOfficeController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminRiderController;
use App\Http\Controllers\Office\OfficeAuthController;
use App\Http\Controllers\Office\OfficeHomeController;
use App\Http\Controllers\Office\OfficeReportController;
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

    Route::middleware('guest:web')->group(function () {
        Route::get('login', [AdminAuthController::class, 'AdminLogin'])->name('login');
        Route::post('login', [AdminAuthController::class, 'AdminLoginSubmit'])->name('login.submit');
    });

    Route::middleware('auth:web')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'AdminLogout'])->name('logout');
        // 
        Route::get('home', [AdminHomeController::class, 'AdminHome'])->name('home');

        // Rider
        Route::prefix('rider')->name('rider.')->group(function () {
            Route::get('list', [AdminRiderController::class, 'RiderList'])->name('list');
            Route::get('new', [AdminRiderController::class, 'RiderNew'])->name('new');
            Route::get('add', [AdminRiderController::class, 'RiderAdd'])->name('add');
            Route::post('store', [AdminRiderController::class, 'RiderStore'])->name('store');
            Route::get('edit/{rider}', [AdminRiderController::class, 'RiderEdit'])->name('edit');
            Route::post('update/{rider}', [AdminRiderController::class, 'RiderUpdate'])->name('update');
            Route::post('active/{rider}', [AdminRiderController::class, 'RiderActive'])->name('active');
            Route::post('upload/{rider}', [AdminRiderController::class, 'RiderUpload'])->name('upload');
            Route::get('document/{rider}', [AdminRiderController::class, 'RiderDocument'])->name('document');
        });

        // Office
        Route::prefix('office')->name('office.')->group(function () {
            Route::get('list', [AdminOfficeController::class, 'OfficeList'])->name('list');
            Route::get('add', [AdminOfficeController::class, 'OfficeAdd'])->name('add');
            Route::post('store', [AdminOfficeController::class, 'OfficeStore'])->name('store');
            Route::get('edit/{office}', [AdminOfficeController::class, 'OfficeEdit'])->name('edit');
            Route::post('update/{office}', [AdminOfficeController::class, 'OfficeUpdate'])->name('update');
            Route::post('active/{office}', [AdminOfficeController::class, 'OfficeActive'])->name('active');
        });

        // Complaints
        Route::prefix('complaint')->name('complaint.')->group(function () {
            Route::get('rider', [AdminHomeController::class, 'ComplaintList'])->name('rider.list');
            Route::get('office', [AdminHomeController::class, 'ComplaintList'])->name('office.list');
            Route::get('company', [AdminHomeController::class, 'ComplaintList'])->name('company.list');
        });

        // Country
        Route::prefix('country')->name('country.')->group(function () {
            Route::get('list', [AdminCountryController::class, 'CountryList'])->name('list');
            Route::post('store', [AdminCountryController::class, 'CountryStore'])->name('store');
            Route::post('update/{country}', [AdminCountryController::class, 'CountryUpdate'])->name('update');
            Route::post('active/{country}', [AdminCountryController::class, 'CountryActive'])->name('active');
        });

        // ActionBackLog
        Route::prefix('log')->name('log.')->group(function () {
            Route::get('rider', [AdminHomeController::class, 'ActionBackLog'])->name('rider.list');
            Route::post('rider', [AdminHomeController::class, 'ActionBackLog'])->name('rider.list');
            Route::get('office', [AdminHomeController::class, 'ActionBackLog'])->name('office.list');
            Route::post('office', [AdminHomeController::class, 'ActionBackLog'])->name('office.list');
            Route::get('company', [AdminHomeController::class, 'ActionBackLog'])->name('company.list');
            Route::post('company', [AdminHomeController::class, 'ActionBackLog'])->name('company.list');
            Route::get('integration', [AdminHomeController::class, 'ActionBackLog'])->name('integration.list');
            Route::post('integration', [AdminHomeController::class, 'ActionBackLog'])->name('integration.list');
        });

        // Reports
        Route::prefix('report')->name('report.')->group(function () {
            Route::get('shift', [AdminReportController::class, 'ReportList'])->name('shift.list');
            Route::post('shift', [AdminReportController::class, 'ReportList'])->name('shift.list');
            Route::post('shift/details', [AdminReportController::class, 'ReportDetails'])->name('shift.details');

            Route::get('order', [AdminReportController::class, 'ReportList'])->name('order.list');
            Route::post('order', [AdminReportController::class, 'ReportList'])->name('ordet.list');
            Route::post('order/details', [AdminReportController::class, 'ReportDetails'])->name('order.details');

            Route::get('accept', [AdminReportController::class, 'ReportList'])->name('accept.list');
            Route::post('accept', [AdminReportController::class, 'ReportList'])->name('accept.list');
            Route::post('accept/details', [AdminReportController::class, 'ReportDetails'])->name('accept.details');

            Route::get('absence', [AdminReportController::class, 'ReportList'])->name('absence.list');
            Route::post('absence', [AdminReportController::class, 'ReportList'])->name('absence.list');
            Route::post('absence/details', [AdminReportController::class, 'ReportDetails'])->name('absence.details');

            Route::get('accident', [AdminReportController::class, 'ReportList'])->name('accident.list');
            Route::post('accident', [AdminReportController::class, 'ReportList'])->name('accident.list');
            Route::post('accident/details', [AdminReportController::class, 'ReportDetails'])->name('accident.details');

            Route::get('annual', [AdminReportController::class, 'ReportList'])->name('annual.list');
            Route::post('annual', [AdminReportController::class, 'ReportList'])->name('annual.list');
            Route::post('annual/details', [AdminReportController::class, 'ReportDetails'])->name('annual.details');

            Route::get('bonus', [AdminReportController::class, 'ReportList'])->name('bonus.list');
            Route::post('bonus', [AdminReportController::class, 'ReportList'])->name('bonus.list');
            Route::post('bonus/details', [AdminReportController::class, 'ReportDetails'])->name('bonus.details');

            Route::get('break', [AdminReportController::class, 'ReportList'])->name('break.list');
            Route::post('break', [AdminReportController::class, 'ReportList'])->name('break.list');
            Route::post('break/details', [AdminReportController::class, 'ReportDetails'])->name('break.details');

            Route::get('late', [AdminReportController::class, 'ReportList'])->name('late.list');
            Route::post('late', [AdminReportController::class, 'ReportList'])->name('late.list');
            Route::post('late/details', [AdminReportController::class, 'ReportDetails'])->name('late.details');

            Route::get('feedback', [AdminReportController::class, 'ReportList'])->name('feedback.list');
            Route::post('feedback', [AdminReportController::class, 'ReportList'])->name('feedback.list');
            Route::post('feedback/details', [AdminReportController::class, 'ReportDetails'])->name('feedback.details');
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
            Route::post('delete/{rider}', [OfficeRiderController::class, 'RiderActive'])->name('delete');
        });

        Route::prefix('info')->name('info.')->group(function () {
            Route::get('list', [OfficeHomeController::class, 'InfoList'])->name('list');
            Route::post('add', [OfficeHomeController::class, 'InfoAdd'])->name('add');
            Route::post('edit/{office_member}', [OfficeHomeController::class, 'InfoEdit'])->name('edit');
        });

        Route::prefix('complaint')->name('complaint.')->group(function () {
            Route::get('list', [OfficeHomeController::class, 'ComplaintList'])->name('list');
            Route::post('add', [OfficeHomeController::class, 'ComplaintAdd'])->name('add');
        });

        Route::prefix('report')->name('report.')->group(function () {
            Route::get('shift', [OfficeReportController::class, 'ReportList'])->name('shift.list');
            Route::post('shift', [OfficeReportController::class, 'ReportList'])->name('shift.list');
            Route::post('shift/details', [OfficeReportController::class, 'ReportDetails'])->name('shift.details');

            Route::get('order', [OfficeReportController::class, 'ReportList'])->name('order.list');
            Route::post('order', [OfficeReportController::class, 'ReportList'])->name('ordet.list');
            Route::post('order/details', [OfficeReportController::class, 'ReportDetails'])->name('order.details');

            Route::get('accept', [OfficeReportController::class, 'ReportList'])->name('accept.list');
            Route::post('accept', [OfficeReportController::class, 'ReportList'])->name('accept.list');
            Route::post('accept/details', [OfficeReportController::class, 'ReportDetails'])->name('accept.details');

            Route::get('absence', [OfficeReportController::class, 'ReportList'])->name('absence.list');
            Route::post('absence', [OfficeReportController::class, 'ReportList'])->name('absence.list');
            Route::post('absence/details', [OfficeReportController::class, 'ReportDetails'])->name('absence.details');

            Route::get('accident', [OfficeReportController::class, 'ReportList'])->name('accident.list');
            Route::post('accident', [OfficeReportController::class, 'ReportList'])->name('accident.list');
            Route::post('accident/details', [OfficeReportController::class, 'ReportDetails'])->name('accident.details');

            Route::get('annual', [OfficeReportController::class, 'ReportList'])->name('annual.list');
            Route::post('annual', [OfficeReportController::class, 'ReportList'])->name('annual.list');
            Route::post('annual/details', [OfficeReportController::class, 'ReportDetails'])->name('annual.details');

            Route::get('bonus', [OfficeReportController::class, 'ReportList'])->name('bonus.list');
            Route::post('bonus', [OfficeReportController::class, 'ReportList'])->name('bonus.list');
            Route::post('bonus/details', [OfficeReportController::class, 'ReportDetails'])->name('bonus.details');

            Route::get('break', [OfficeReportController::class, 'ReportList'])->name('break.list');
            Route::post('break', [OfficeReportController::class, 'ReportList'])->name('break.list');
            Route::post('break/details', [OfficeReportController::class, 'ReportDetails'])->name('break.details');

            Route::get('late', [OfficeReportController::class, 'ReportList'])->name('late.list');
            Route::post('late', [OfficeReportController::class, 'ReportList'])->name('late.list');
            Route::post('late/details', [OfficeReportController::class, 'ReportDetails'])->name('late.details');

            Route::get('feedback', [OfficeReportController::class, 'ReportList'])->name('feedback.list');
            Route::post('feedback', [OfficeReportController::class, 'ReportList'])->name('feedback.list');
            Route::post('feedback/details', [OfficeReportController::class, 'ReportDetails'])->name('feedback.details');
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
