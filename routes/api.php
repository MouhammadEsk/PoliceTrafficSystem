<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProvinceController;
use App\Http\Controllers\Dashboard\ViolationTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\MyAPIsKey;
use App\Http\Controllers\Dashboard\CarController;
use App\Http\Controllers\Dashboard\ViolationController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;

//
Route::group(['middleware'=>'auth:sanctum'], function () {

    Route::get('/logout',           [AuthController::class, 'logout']);

    // +++++++++++++++++++++++++++++++start Province api+++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Province'], function () {
        Route::get('/index',               [ProvinceController::class, 'index']);
        Route::post('/store',              [ProvinceController::class, 'store']);
        Route::put('/update/{province}',    [ProvinceController::class, 'update']);
        Route::delete('/destroy/{province}', [ProvinceController::class, 'destroy']);
    });
    // +++++++++++++++++++++++++++++++end Province api+++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start ViolationType api+++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'ViolationType'], function () {
        Route::get('/index',               [ViolationTypeController::class, 'index']);
        Route::post('/store',              [ViolationTypeController::class, 'store']);
        Route::put('/update/{ViolationType}', [ViolationTypeController::class, 'update']);
    });
    // +++++++++++++++++++++++++++++++end ViolationType api+++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Violation api+++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Violation'], function () {
        Route::get('/index',               [ViolationController::class, 'index']);
        Route::get('/MyViolation',               [ViolationController::class, 'MyViolation']);
        Route::post('/search',             [ViolationController::class, 'search']);
        Route::get('/show/{violation}',      [ViolationController::class, 'show']);
        Route::post('/store',              [ViolationController::class, 'store']);
        Route::put('/update/{violation}',    [ViolationController::class, 'update']);
        Route::delete('/destroy/{violation}', [ViolationController::class, 'destroy']);
    });
    // +++++++++++++++++++++++++++++++end Violation api+++++++++++++++++++++++++++++++++++


    // +++++++++++++++++++++++++++++++start Car api+++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Car'], function () {
        Route::get('/index',               [CarController::class, 'index']);
        Route::post('/search',             [CarController::class, 'search']);
        Route::get('/show/{car}',      [CarController::class, 'show']);
        Route::post('/store',              [CarController::class, 'store']);
        Route::put('/update/{car}',    [CarController::class, 'update']);
        Route::delete('/destroy/{car}', [CarController::class, 'destroy']);
    });
    // +++++++++++++++++++++++++++++++end Car api+++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Role api+++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Role'], function () {
        Route::get('/index',               [RoleController::class, 'index']);
        Route::post('/grant',               [RoleController::class, 'grant']);
        Route::post('/revoke',               [RoleController::class, 'revoke']);

    });
    // +++++++++++++++++++++++++++++++end Role api+++++++++++++++++++++++++++++++++++



    // +++++++++++++++++++++++++++++++start User api+++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'User'], function () {
        Route::get('/indexUserCars',[UserController::class, 'indexUserCars']);
        Route::post('/find',        [UserController::class, 'find']);
    });
});
// +++++++++++++++++++++++++++++++end User api+++++++++++++++++++++++++++++++++++



Route::group(['middleware' => MyAPIsKey::class], function () {

    Route::group(['prefix' => 'User'], function () {
        Route::post('/login',           [AuthController::class, 'login']);
        Route::post('/register',        [AuthController::class, 'register']);
    });
});















// +++++++++++++++++++++++++++++++start Project api+++++++++++++++++++++++++++++++++++
//    Route::group(['prefix' => 'Project'], function() {
//     Route::get('/index',               [ProjectController::class,'index']);
//     Route::post('/search',             [ProjectController::class,'search']);
//     Route::get('/show/{project}',      [ProjectController::class,'show' ]);
//     Route::post('/store',              [ProjectController::class,'store']);
//     Route::post('/assign/{project}',   [ProjectController::class,'assign']);
//     Route::put('/update/{project}',    [ProjectController::class,'update']);
//     Route::delete('/destroy/{project}',[ProjectController::class,'destroy']);
// });
// +++++++++++++++++++++++++++++++end Project api+++++++++++++++++++++++++++++++++++
