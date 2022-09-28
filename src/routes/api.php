<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function(){
    return response()->json(['api_name'=>'API Test', 'version'=>'Beta V0.0.1']);
});


Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'getList']);
    Route::post('/', [ClientController::class, 'register']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'getList']);
    Route::post('/', [ProductController::class, 'register']);
});

Route::group(['prefix' => 'sells'], function () {
    Route::get('/', [SellController::class, 'getList']);
    Route::post('/', [SellController::class, 'register']);
});

