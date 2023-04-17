<?php

use App\Http\Controllers\Company\CompanyAuthController;
use App\Http\Controllers\Company\CompanyBlockController;
use App\Http\Controllers\Company\CompanyHiringController;
use App\Http\Controllers\Company\CompanyRequestController;
use App\Http\Controllers\Company\CompanyRiderController;
use App\Http\Controllers\Company\CompanyTaskController;
use App\Http\Controllers\Rider\RiderAuthController;
use App\Http\Controllers\Rider\RiderDocumentController;
use App\Http\Controllers\Rider\RiderHomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('rider')->group(function () {
    Route::post('login',                [RiderAuthController::class, 'RiderLogin']);
    Route::post('register',             [RiderAuthController::class, 'RiderRegister']);
    Route::post('logout',               [RiderAuthController::class, 'RiderLogout']);

    Route::post('country/list',         [RiderAuthController::class, 'RiderCountry']);

    Route::post('document/upload',      [RiderDocumentController::class, 'DocumentUpload']);
    Route::post('document/save',        [RiderDocumentController::class, 'DocumentSave']);

    Route::post('/home',                [RiderHomeController::class, 'Home']);
    Route::post('/requests',            [RiderHomeController::class, 'RiderAllRequests']);
    Route::post('/hirings',             [RiderHomeController::class, 'RiderAllHirings']);
    Route::post('/tasks',               [RiderHomeController::class, 'RiderAllTasks']);
    Route::post('/request/send',        [RiderHomeController::class, 'RiderRequest']);
    Route::post('/hiring/apply',        [RiderHomeController::class, 'RiderHiringApply']);
    Route::post('/task/apply',          [RiderHomeController::class, 'RiderTaskApply']);

    Route::post('profile/edit',         [RiderAuthController::class, 'EditProfile']);
    Route::post('/myrequests',          [RiderHomeController::class, 'RiderMyRequests']);
    Route::post('/complaint',           [RiderHomeController::class, 'RiderComplaint']);
});

Route::prefix('company')->group(function () {
    Route::post('login',                [CompanyAuthController::class, 'CompanyLogin']);
    Route::post('register',             [CompanyAuthController::class, 'CompanyRegister']);
    Route::post('logout',               [CompanyAuthController::class, 'CompanyLogout']);

    Route::post('hiring',               [CompanyHiringController::class, 'CompanyHiring']);
    Route::post('hiring/apply',         [CompanyHiringController::class, 'CompanyHiringApply']);
    Route::post('hiring/apply/accept',  [CompanyHiringController::class, 'CompanyAcceptHiring']);
    Route::post('hiring/apply/refuse',  [CompanyHiringController::class, 'CompanyRefuseHiring']);
    Route::post('hiring/add',           [CompanyHiringController::class, 'CompanyAddHiring']);
    Route::post('hiring/end',           [CompanyHiringController::class, 'CompanyEndHiring']);
    Route::post('hiring/delete',        [CompanyHiringController::class, 'CompanyDeleteHiring']);

    Route::post('task',                 [CompanyTaskController::class, 'CompanyTask']);
    Route::post('task/apply',           [CompanyTaskController::class, 'CompanyTaskApply']);
    Route::post('task/apply/accept',    [CompanyTaskController::class, 'CompanyAcceptTask']);
    Route::post('task/apply/refuse',    [CompanyTaskController::class, 'CompanyRefuseTask']);
    Route::post('task/add',             [CompanyTaskController::class, 'CompanyAddTask']);
    Route::post('task/end',             [CompanyTaskController::class, 'CompanyEndTask']);
    Route::post('task/delete',          [CompanyTaskController::class, 'CompanyDeleteTask']);

    Route::post('request',              [CompanyRequestController::class, 'CompanyRiderRequest']);
    Route::post('request/accept',       [CompanyRequestController::class, 'CompanyAcceptRequest']);
    Route::post('request/refuse',       [CompanyRequestController::class, 'CompanyRefuseRequest']);

    Route::post('block',                [CompanyBlockController::class, 'CompanyBlock']);
    Route::post('rider/block',          [CompanyBlockController::class, 'CompanyBlockRider']);
    Route::post('rider/unblock',        [CompanyBlockController::class, 'CompanyUnBlockRider']);

    Route::post('rider',                [CompanyRiderController::class, 'CompanyRider']);
    Route::post('rider/delete',         [CompanyRiderController::class, 'CompanyDeleteRider']);
});
