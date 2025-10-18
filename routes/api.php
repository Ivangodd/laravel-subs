<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {

    // Rutas públicas
    Route::post('login', [AuthController::class, 'login']);

    // Rutas protegidas
    Route::middleware('auth:sanctum')->group(function () {
        //Plans
        Route::get('plans', [PlanController::class, 'index']);
        Route::post('createPlan', [PlanController::class, 'store']);
        Route::get('plan/{id}', [PlanController::class, 'show']);
        Route::post('updatePlan/{id}', [PlanController::class, 'update']);
        Route::delete('plan/{id}', [PlanController::class, 'destroy']);

        //Company
        Route::get('companies', [CompanyController::class, 'index']);
        Route::post('createCompany', [CompanyController::class, 'store']);
        Route::get('company/{id}', [CompanyController::class, 'show']);
        Route::post('updateCompany/{id}', [CompanyController::class, 'update']);
        Route::delete('company/{id}', [CompanyController::class, 'destroy']);

        //Subscription
        Route::post('createSubscription', [SubscriptionController::class, 'store']);

        //User
        Route::get('users', [UserController::class, 'index']);
        Route::post('createUser', [UserController::class, 'store']);
        Route::get('user/{id}', [UserController::class, 'show']);
        Route::post('updateUser/{id}', [UserController::class, 'update']);
        Route::delete('user/{id}', [UserController::class, 'destroy']);

        Route::post('logout', [AuthController::class, 'logout']);
    });
});
