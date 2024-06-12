<?php

namespace routes\api_routes;

use App\Http\Controllers\Api\v1\Team\TeamController;
use Illuminate\Support\Facades\Route;

Route::controller(TeamController::class)
    ->prefix('/teams')
    ->group(function () {
        Route::post('/', 'store')->name('team.store');
        Route::get('/', 'index')->name('team.index');
        Route::patch('/{team}', 'update')->name('team.update');
        Route::delete('/{team}', 'delete')->name('team.delete');
    });
