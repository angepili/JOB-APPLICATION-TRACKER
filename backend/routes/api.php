<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\ReminderController;
use App\Http\Controllers\Api\AuthController;


// Route::middleware('auth:sanctum')->group( function() {
//     Route::apiResource('applications', ApplicationController::class );
// });


// Temporaneo, in routes/api.php
Route::apiResource('applications', ApplicationController::class);
Route::apiResource('companies', CompanyController::class );
Route::apiResource('reminders', ReminderController::class );
Route::get('statuses', [ StatusController::class, 'index' ] );
Route::get('statuses/{status}', [ StatusController::class, 'show' ] );

Route::post('/login', [ AuthController::class, 'login' ] );
Route::post('/register', [ AuthController::class, 'register' ] );
Route::middleware('/auth:sanctum')->post( 'logout', [ AuthController::class, 'logout' ] );
