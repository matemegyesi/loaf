<?php

use App\Http\Controllers\ElementController;
use App\Http\Controllers\LegendController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\MythController;
use Illuminate\Support\Facades\Route;

Route::apiResource('myths', MythController::class);

Route::apiResource('legends', LegendController::class)->only(['index', "show"]);

Route::get('/images', [ImageController::class, 'index']);
Route::get('/images/{image}', [ImageController::class, 'show']);
Route::post('/images', [ImageController::class, 'store']);
Route::get('/habitats', [HabitatController::class, 'index'])->name("habitats.index");
Route::get('/sizes', [SizeController::class, 'index'])->name("sizes.index");
Route::get('/elements', [ElementController::class, 'index'])->name("elements.index");
