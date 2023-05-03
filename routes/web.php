<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::redirect('/', '/home');
Route::get('/home', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('reports');
