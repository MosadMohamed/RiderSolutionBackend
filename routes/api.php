<?php

use App\Http\Controllers\Company\CompanyAuthController;
use App\Http\Controllers\Company\CompanyBlockController;
use App\Http\Controllers\Company\CompanyHiringController;
use App\Http\Controllers\Company\CompanyRequestController;
use App\Http\Controllers\Company\CompanyRiderController;
use App\Http\Controllers\Company\CompanyTaskController;
use App\Http\Controllers\Integration\IntegrationAbsenceController;
use App\Http\Controllers\Integration\IntegrationAcceptController;
use App\Http\Controllers\Integration\IntegrationAccidentController;
use App\Http\Controllers\Integration\IntegrationAnnualController;
use App\Http\Controllers\Integration\IntegrationAuthController;
use App\Http\Controllers\Integration\IntegrationBonusController;
use App\Http\Controllers\Integration\IntegrationBreakController;
use App\Http\Controllers\Integration\IntegrationFeedbackController;
use App\Http\Controllers\Integration\IntegrationLateController;
use App\Http\Controllers\Integration\IntegrationOrderController;
use App\Http\Controllers\Integration\IntegrationShiftController;
use App\Http\Controllers\Rider\RiderAuthController;
use App\Http\Controllers\Rider\RiderDocumentController;
use App\Http\Controllers\Rider\RiderHomeController;
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

/*
|--------------------------------------------------------------------------
| Rider Routes
|--------------------------------------------------------------------------
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

/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
*/
Route::prefix('company')->group(function () {
    Route::post('login',                [CompanyAuthController::class, 'CompanyLogin']);
    Route::post('register',             [CompanyAuthController::class, 'CompanyRegister']);
    Route::post('logout',               [CompanyAuthController::class, 'CompanyLogout']);

    Route::post('hiring',               [CompanyHiringController::class, 'CompanyHiring']);
    Route::post('hiring/apply',         [CompanyHiringController::class, 'CompanyHiringApply']);
    Route::post('hiring/apply/accept',  [CompanyHiringController::class, 'CompanyAcceptHiring']);
    Route::post('hiring/apply/refuse',  [CompanyHiringController::class, 'CompanyRefuseHiring']);
    Route::post('hiring/add',           [CompanyHiringController::class, 'CompanyAddHiring']);
    Route::post('hiring/edit',          [CompanyHiringController::class, 'CompanyEditHiring']);
    Route::post('hiring/end',           [CompanyHiringController::class, 'CompanyEndHiring']);
    Route::post('hiring/delete',        [CompanyHiringController::class, 'CompanyDeleteHiring']);

    Route::post('task',                 [CompanyTaskController::class, 'CompanyTask']);
    Route::post('task/apply',           [CompanyTaskController::class, 'CompanyTaskApply']);
    Route::post('task/apply/accept',    [CompanyTaskController::class, 'CompanyAcceptTask']);
    Route::post('task/apply/refuse',    [CompanyTaskController::class, 'CompanyRefuseTask']);
    Route::post('task/add',             [CompanyTaskController::class, 'CompanyAddTask']);
    Route::post('task/edit',            [CompanyTaskController::class, 'CompanyEditTask']);
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

/*
|--------------------------------------------------------------------------
|  Integration Routes
|--------------------------------------------------------------------------
*/
Route::prefix('integration')->group(function () {
    Route::post('login',                [IntegrationAuthController::class, 'IntegrationLogin']);

    Route::post('shift/add',            [IntegrationShiftController::class, 'IntegrationShiftAdd']);

    Route::post('order/add',            [IntegrationOrderController::class, 'IntegrationOrderAdd']);

    Route::post('accept/add',           [IntegrationAcceptController::class, 'IntegrationAcceptAdd']);

    Route::post('break/add',            [IntegrationBreakController::class, 'IntegrationBreakAdd']);

    Route::post('absence/add',          [IntegrationAbsenceController::class, 'IntegrationAbsenceAdd']);

    Route::post('late/add',             [IntegrationLateController::class, 'IntegrationLateAdd']);

    Route::post('accident/add',         [IntegrationAccidentController::class, 'IntegrationAccidentAdd']);

    Route::post('annual/add',           [IntegrationAnnualController::class, 'IntegrationAnnualAdd']);

    Route::post('bonus/add',            [IntegrationBonusController::class, 'IntegrationBonusAdd']);

    Route::post('feedback/add',         [IntegrationFeedbackController::class, 'IntegrationFeedbackAdd']);
});
