<?php

use App\Http\Controllers\GradeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(GradeController::class)
->prefix('/teams')
->middleware(['auth:sanctum', 'verified.email'])
->group(function () {
    Route::post('/{team}/evaluation', 'store')->name('grade.store');
});
