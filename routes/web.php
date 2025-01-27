<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StepFormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/confirm', [EmployeeController::class, 'confirm']);
Route::post('/employee/store', [EmployeeController::class, 'store']);

Route::get('/step-form/{step?}', [StepFormController::class, 'show'])->name('step-form.show');
Route::post('/step-form/{step}', [StepFormController::class, 'store'])->name('step-form.store');

