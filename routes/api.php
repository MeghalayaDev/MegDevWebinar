<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WebinarApiController;
use App\Http\Controllers\API\LoginApiController;

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

Route::post('login', [LoginApiController::class, 'login']);

Route::get('/webinars', [WebinarApiController::class, 'index']);

Route::get('/viewWebinar/{id}', [WebinarApiController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/createWebinar', [WebinarApiController::class, 'store']);

    Route::put('/updateWebinar/{id}', [WebinarApiController::class, 'update']);

    Route::delete('/deleteWebinar/{id}', [WebinarApiController::class, 'destroy']);
});
