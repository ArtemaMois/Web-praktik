<?php


use App\Http\Controllers\Api\v1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
    ->prefix('/users')
    ->group(
    function(){
});
