<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\ExhibitorController as AdminExhibitorController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

// Rute publice
Route::get('/', [HomeController::class, 'index']);
Route::get('/masini', [CarController::class, 'index']);
Route::get('/masini/{slug}', [CarController::class, 'show']);
Route::get('/expozanti', [ExhibitorController::class, 'index']);
Route::get('/expozanti/{slug}', [ExhibitorController::class, 'show']);
Route::get('/program', [ProgramController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/search', [SearchController::class, 'index']);

Route::get('/compare', [CompareController::class, 'index']);
Route::post('/compare/{car}', [CompareController::class, 'add']);
Route::delete('/compare/{car}', [CompareController::class, 'remove']);

// Rute admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/cars', [AdminCarController::class, 'index']);
    Route::get('/cars/create', [AdminCarController::class, 'create']);
    Route::post('/cars', [AdminCarController::class, 'store']);
    Route::get('/cars/{car}/edit', [AdminCarController::class, 'edit']);
    Route::put('/cars/{car}', [AdminCarController::class, 'update']);
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy']);

    Route::get('/exhibitors', [AdminExhibitorController::class, 'index']);
    Route::get('/exhibitors/create', [AdminExhibitorController::class, 'create']);
    Route::post('/exhibitors', [AdminExhibitorController::class, 'store']);
    Route::get('/exhibitors/{exhibitor}/edit', [AdminExhibitorController::class, 'edit']);
    Route::put('/exhibitors/{exhibitor}', [AdminExhibitorController::class, 'update']);
    Route::delete('/exhibitors/{exhibitor}', [AdminExhibitorController::class, 'destroy']);

    Route::get('/contacts', [AdminContactController::class, 'index']);
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show']);
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';