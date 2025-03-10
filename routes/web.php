<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

Route::view('/', 'home');

Route::get('/appointments', [AppointmentController::class, 'index'])
    ->name('appointments.index');

Route::get('/appointments/create', [AppointmentController::class, 'create'])
    ->name('appointments.create');

Route::post('/appointments/store', [AppointmentController::class, 'store'])
    ->name('appointments.store');

Route::get('/appointments/{id}', [AppointmentController::class, 'show'])
    ->name('appointments.show')
    ->whereNumber('id');
