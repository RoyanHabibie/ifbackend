<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/products/id/{id}', [ProductController::class, 'getProductId']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/id/{id}', [ProductController::class, 'destroy']);
Route::put('/products/id/{id}', [ProductController::class, 'update']);
