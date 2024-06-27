<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WartaApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});

Route::get('wartas', [WartaApiController::class, 'index']);
Route::get('wartas/{id}', [WartaApiController::class, 'show']);
Route::post('wartas', [WartaApiController::class, 'store']);



