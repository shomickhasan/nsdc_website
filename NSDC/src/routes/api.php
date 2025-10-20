<?php

use App\Http\Controllers\Api\Auth\UserAuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',[UserAuthenticationController::class,'login']);

Route::middleware(['auth:api','role.permission.gate'])->group(function(){
    Route::post('logout',[UserAuthenticationController::class,'logout']);
    Route::get('role/permission',[UserAuthenticationController::class,'me']);
    Route::get('user/territories',[UserAuthenticationController::class,'userTerritory']);
});

Route::any('{any}', function () {
    return response()->json([
        'status_code' => 404,
        'status' => 'error',
        'error' => 'Route not found.',
        'error_code' => [404],
        'success' => [],
        'success_code' => [],
        'data' => [],
    ], 404);
})->where('any', '.*');
