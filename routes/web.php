<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::post('/register', [EventController::class, 'register'])->name('register');
Route::get('/admin/attendees', [EventController::class, 'admin'])->name('admin.attendees');
