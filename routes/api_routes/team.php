<?php

namespace routes\api_routes;

use App\Http\Controllers\Api\v1\Team\TeamController;
use App\Http\Middleware\UnverifiedEmailMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(TeamController::class)
    ->prefix('/teams')
    ->group(function () {
        Route::post('/', 'store')->name('team.store');
        Route::post('/email-verification/{team}', 'verifyEmail')
            ->middleware('unverified.email')
            ->name('team.verify.email');
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/', 'index')->name('team.index');
            Route::get('/{team}', 'show')->name("team.show");
            Route::patch('/{team}', 'update')->name('team.update');
            Route::delete('/{team}', 'delete')->name('team.delete');
        });
    });
