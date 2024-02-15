<?php

use App\Http\Controllers\AuthApi\AuthController;
use App\Http\Controllers\TaskController;
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

Route::prefix("task")->middleware('auth:sanctum')->group(function(){

    
/**
 * 
 * Task 
 */


    Route::get('show/{id}',[TaskController::class,"show"]);
    Route::get('index',[TaskController::class,"index"]);
    Route::post('store',[TaskController::class,"CreateTask"]);
    Route::put('update/{id}',[TaskController::class,"update"]);
    Route::delete('destroy/{id}',[TaskController::class,"destroy"]);
    Route::match(['get','post'],'filter',[TaskController::class,'FilterTask']);

        
/**
 * 
 * Logout 
 */

    Route::post('/logout',[AuthController::class,'logout']);

});

Route::post('/login',[AuthController::class,'login']);






