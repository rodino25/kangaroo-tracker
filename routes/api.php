<?php

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

Route::group(["prefix" => "/auth"], function() {
    Route::post("/login", [App\Http\Controllers\AuthController::class, "authenticate"]);
    Route::get("/logout", [App\Http\Controllers\AuthController::class, "logout"]);
});

// Route::group(["prefix" => "/kangaroos", "middleware" => "auth:api"], function() {
//     Route::resource("/", App\Http\Controllers\KangarooController::class);
//     Route::get("/options", [App\Http\Controllers\KangarooController::class, "getOptions"]);
// });

Route::middleware("auth:api")->get("/kangaroos/options", [App\Http\Controllers\KangarooController::class, "getOptions"]);
Route::middleware("auth:api")->resource("/kangaroos", App\Http\Controllers\KangarooController::class);