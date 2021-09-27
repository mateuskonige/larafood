<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantApiController;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tenants', [TenantApiController::class, 'index']);
Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);

Route::get('/categories/{uuid}', [CategoryApiController::class, 'categoriesbyTenant']);
Route::get('/categories/{uuid}/{url}', [CategoryApiController::class, 'categoriesbyTenantShow']);
