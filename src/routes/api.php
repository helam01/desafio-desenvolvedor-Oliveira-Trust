<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;


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


Route::group(['prefix' => 'currencies'], function () {
    Route::get('/origins', [CurrencyController::class, 'getOriginList']);
    Route::get('/targets', [CurrencyController::class, 'getTargetList']);
});


