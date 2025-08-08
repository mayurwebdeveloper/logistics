<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConsignmentController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\ConsignorController;
use App\Http\Controllers\Admin\ConsigneeController;
use App\Http\Controllers\Admin\CompanyController;

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware(['auth:admin', App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Resource routes for CRUD operations
        Route::resource('consignments', ConsignmentController::class);
        Route::resource('trucks', TruckController::class);
        Route::resource('consignors', ConsignorController::class);
        Route::resource('consignees', ConsigneeController::class);
        Route::resource('companies', CompanyController::class);
        
        // Additional routes
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
    });
});