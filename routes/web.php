<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ReportController;

Route::get('/', [ProjectController::class, 'index'])->name('home');
Route::resource('projects', ProjectController::class);
Route::middleware('auth')->group(function () {
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/projects/{project}/donate', [DonationController::class, 'store'])->name('donations.store');
    Route::post('/projects/{project}/reports', [ReportController::class, 'store'])->name('reports.store');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/reports', [ReportController::class, 'generateReport'])->name('reports.index');
