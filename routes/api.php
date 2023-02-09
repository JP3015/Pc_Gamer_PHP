<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PcGamerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pc', [PcGamerController::class,'index']);

Route::get('pc/{id}', [PcGamerController::class,'show']);

Route::post('pc', [PcGamerController::class,'store']);

Route::put('pc/{id}', [PcGamerController::class,'update']);

Route::delete('pc/{id}', [PcGamerController::class,'destroy']);