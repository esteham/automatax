<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Taxpayer\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth'])->group(function () {
    // Role-aware dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    /*------- Admin area ---------*/
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        // Route::get('/users', [Admin\UserController::class, 'index'])->name('admin.users.index');
    });

    /*------ Auditor/Inspector -------*/
    Route::prefix('audit')->middleware('role:auditor_inspector')->group(function () {
        // 
    });

    /*-------- Accountant -----------*/
    Route::prefix('accounts')->middleware('role:accountant')->group(function () {
        // 
    });

    /*-------- Taxpayer area ---------*/
    Route::prefix('taxpayer')->middleware('role:taxpayer')->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('taxpayer.profile.show');
        Route::post('/profile', [ProfileController::class, 'update'])->name('taxpayer.profile.update');
        //
    });

});
