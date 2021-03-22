<?php

use App\Http\Controllers\dummyAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CategoriaController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::apiResource("members",MemberController::class);
});

Route::get("data",[dummyAPI::class,'getData']);

//ENDPOINT de Devices
Route::get("listDevices/{id?}",[DeviceController::class,'list']);
Route::get("listAllDevices",[DeviceController::class,'listAll']);
Route::get("listDevice/{id}",[DeviceController::class,'listParams']);
Route::post("addDevice",[DeviceController::class,'add']);
Route::put("updateDevice",[DeviceController::class,'update']);
Route::delete("deleteDevice/{id}",[DeviceController::class,'delete']);
Route::get("searchDevice/{name}",[DeviceController::class,'search']);
Route::post("saveDevice",[DeviceController::class,'testData']);

//API RESOURCES
Route::post("login",[UserController::class,'index']);
Route::post("upload",[FileController::class,'upload']);


/********************API-ALWAYSVACANT*************** */

//Vacantes
Route::get("vacantes/{id?}",[VacanteController::class,'index']);
Route::post("vacantes",[VacanteController::class,'store']);
Route::put("vacantes",[VacanteController::class,'update']);
Route::delete("vacantes",[VacanteController::class,'destroy']);

//Categorias
Route::get("categorias/{id?}",[CategoriaController::class,'index']);
Route::post("categorias",[CategoriaController::class,'store']);
Route::put("categorias",[CategoriaController::class,'update']);
Route::delete("categorias",[CategoriaController::class,'destroy']);


//Usuarios

//AUTH

//Ciudades

//Paises