<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;

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

Route::get("data", [dummyAPI::class, 'getData']);

Route::get("list/{id?}", [DeviceController::class, 'list']);

Route::post("add", [DeviceController::class, 'add']);

Route::put("update", [DeviceController::class, 'update']);

Route::get("search/{name}", [DeviceController::class, 'search']);

Route::delete("delete/{id}", [DeviceController::class, 'delete']);

Route::post("save", [DeviceController::class, 'testData']);


Route::apiResource("member", MemberController::class);
