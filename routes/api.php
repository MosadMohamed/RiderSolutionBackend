<?php

use App\Http\Controllers\Rider\RiderAuthController;
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

    Route::post('country/list', [RiderAuthController::class, 'RiderCountry']);

    Route::post('document/upload', [RiderAuthController::class, 'DocumentUpload']);
});
