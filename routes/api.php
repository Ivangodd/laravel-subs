<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;


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
