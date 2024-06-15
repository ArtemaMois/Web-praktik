<?php

namespace routes\api_routes;

use App\Http\Controllers\Api\v1\Team\TeamController;
use App\Http\Middleware\UnverifiedEmailMiddleware;
use App\Http\Middleware\VerifiedEmailMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(TeamController::class)
    ->prefix('/teams')
    ->group(function () {
        Route::post('/', 'store')->name('team.store');
        Route::get('/', 'index')->name('team.index');
        Route::patch('/{team}', 'update')->name('team.update');
        Route::delete('/{team}', 'delete')->name('team.delete');
        Route::post('/email-verification/{team}', 'verifyEmail')
            ->middleware('unverified.email')
            ->name('team.verify.email');
    });
