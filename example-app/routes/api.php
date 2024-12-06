<?php

use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personaje;

Route::get("/personaje", [personaje::class, "getAll"]);
Route::post("/personaje", [personaje::class, "createPj"]);
Route::delete("/personaje/{id}", [personaje::class, "deletePj"]);
Route::put("/personaje/{id}", [personaje::class, "modifyPj"]);
Route::get("/Item/{id}", [itemController::class, "getItem"]);

