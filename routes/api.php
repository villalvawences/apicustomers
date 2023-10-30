<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\AuthController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('registro', [AuthController::class, 'register']);
Route::post('acceso', [AuthController::class, 'access']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('customers', [CustomerController::class, 'store']);
    Route::get('/customers/search', [CustomerController::class, 'searchCustomer']);
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy']);
    Route::post('eliminarToken', [AuthController::class, 'deletedToken']);
});
