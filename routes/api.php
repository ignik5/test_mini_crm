<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\StaffApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('companies', [CompanyApiController::class, 'index']);
Route::get('company/{id}', [CompanyApiController::class, 'company']);

Route::get('staffs', [StaffApiController::class, 'index']);
Route::get('staff/{id}', [StaffApiController::class, 'staff']);
