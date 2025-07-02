<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Migration completed on Railway DB!';
});

Route::post('/signup', [AuthController::class, 'signup']);

Route::post('/login', [AuthController::class, 'login']);


Route::get('/dummy', [DummyController::class, 'getDummy']);


Route::middleware('auth:sanctum')->post('/feedback', [FeedbackController::class, 'store']);

// routes/api.php
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return response()->json($request->user());
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


