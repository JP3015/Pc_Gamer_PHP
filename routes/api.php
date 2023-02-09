<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PcGamerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [PcGamerController::class,'index'])->name('index');

Route::get('/{id}', [PcGamerController::class,'show']);

Route::post('', [PcGamerController::class,'store'])->name('pc_gamer.store');

Route::get('/{id}/edit', [PcGamerController::class, 'edit'])->name('pc_gamer.edit');

Route::put('/{id}/update', [PcGamerController::class,'update'])->name('pc_gamer.update');

Route::delete('/{id}', [PcGamerController::class,'destroy'])->name('pc_gamer.destroy');