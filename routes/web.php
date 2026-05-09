<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/masini', [CarController::class, 'index']);
Route::get('/masini/{slug}', [CarController::class, 'show']);

Route::get('/expozanti', [ExhibitorController::class, 'index']);
Route::get('/expozanti/{slug}', [ExhibitorController::class, 'show']);

Route::get('/program', [ProgramController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);