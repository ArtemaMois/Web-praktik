<?php

namespace routes\api_routes;

use App\Http\Controllers\Api\v1\Team\TeamController;
use App\Http\Middleware\UnverifiedEmailMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(TeamController::class)
    ->prefix('/teams')
    ->group(function () {
        Route::get('/', 'index')->name('team.index');
        Route::post('/', 'store')->name('team.store');
        Route::post('/email-verification', 'verifyEmail')
            ->middleware('unverified.email')
            ->name('team.verify.email');
        Route::post('/email-verification/resend', 'resendVerifyEmail')
            ->middleware('unverified.email')
            ->name('team.verify.email.resend');
        Route::middleware(['auth:sanctum', 'verified.email'])->group(function () {
            Route::get('/{team}', 'show')->name("team.show");
            Route::patch('/{team}', 'update')->name('team.update');
            Route::delete('/{team}', 'delete')->name('team.delete');
        });
    });
