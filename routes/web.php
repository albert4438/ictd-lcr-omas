<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

// Welcome Page Route
Route::get('/', function () {
    return view('layouts.app');
})->name('welcome');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('layouts.app');  // Return the main Vue app view
    })->name('admin.login');
    Route::get('/register', function () {
        return view('layouts.app');  // Return the main Vue app view
    })->name('admin.register');
    Route::post('/register', [AdminController::class, 'register']);
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Employee Routes
Route::prefix('employee')->group(function () {
    Route::get('/login', function () {
        return view('layouts.app');  // Return the main Vue app view
    })->name('employee.login');
    Route::post('/login', [EmployeeController::class, 'login']);
    Route::post('/logout', [EmployeeController::class, 'logout'])->name('employee.logout');
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
});