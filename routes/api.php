<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('rider')->group(function () {
    Route::post('login', [RiderAuthController::class, 'RiderLogin']);
    Route::post('register', [RiderAuthController::class, 'RiderRegister']);
    Route::post('logout', [RiderAuthController::class, 'RiderLogout']);

    Route::post('country/list', [RiderAuthController::class, 'RiderCountry']);

    Route::post('document/upload', [RiderDocumentController::class, 'DocumentUpload']);
    Route::post('document/save', [RiderDocumentController::class, 'DocumentSave']);

    Route::post('/home', [RiderHomeController::class, 'Home']);
    Route::post('/requests', [RiderHomeController::class, 'RiderAllRequests']);
    Route::post('/hirings', [RiderHomeController::class, 'RiderAllHirings']);
    Route::post('/tasks', [RiderHomeController::class, 'RiderAllTasks']);
    Route::post('/request/send', [RiderHomeController::class, 'RiderRequest']);
    Route::post('/hiring/apply', [RiderHomeController::class, 'RiderHiringApply']);
    Route::post('/task/apply', [RiderHomeController::class, 'RiderTaskApply']);

    Route::post('profile/edit', [RiderAuthController::class, 'EditProfile']);
    Route::post('/myrequests', [RiderHomeController::class, 'RiderMyRequests']);
    Route::post('/complaint', [RiderHomeController::class, 'RiderComplaint']);
});
