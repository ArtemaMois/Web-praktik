<?php


use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Middleware\GuestTeamMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
    ->group(function() {
    Route::post('/login', 'login')->middleware(GuestTeamMiddleware::class)->name('login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('logout');
}) ;
