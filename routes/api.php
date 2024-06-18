<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// //login
// Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

// //logout
// Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

//company
Route::get('/company', [App\Http\Controllers\Api\CompanyController::class, 'show']);

//checkin
Route::post('/checkin', [App\Http\Controllers\Api\AttendanceController::class, 'checkin']);

//checkout
Route::post('/checkout', [App\Http\Controllers\Api\AttendanceController::class, 'checkout']);

//is checkin
Route::get('/is-checkin', [App\Http\Controllers\Api\AttendanceController::class, 'isCheckedin']);

//update profile
Route::post('/update-profile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile']);

//create permission
// Route::apiResource('/api-permissions', App\Http\Controllers\Api\PermissionController::class);

//notes
// Route::apiResource('/api-notes', App\Http\Controllers\Api\NoteController::class);

// //update fcm token
// Route::post('/update-fcm-token', [App\Http\Controllers\Api\AuthController::class, 'updateFcmToken']);

//get attendance
Route::get('/api-attendances', [App\Http\Controllers\Api\AttendanceController::class, 'index']);
