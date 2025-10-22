<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taxpayer\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/taxpayer/profile', [ProfileController::class, 'update'])->name('api.taxpayer.profile.update');
});
