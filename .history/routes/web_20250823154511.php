<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EmailTemplateController;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::post('/register', [EventController::class, 'register'])->name('register');
Route::get('/admin/attendees', [EventController::class, 'admin'])->name('admin.attendees');

// Admin Email Templates Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/email-templates', [EmailTemplateController::class, 'index'])->name('email-templates.index');
    Route::get('/email-templates/create', [EmailTemplateController::class, 'create'])->name('email-templates.create');
    Route::post('/email-templates', [EmailTemplateController::class, 'store'])->name('email-templates.store');
    Route::get('/email-templates/{key}', [EmailTemplateController::class, 'show'])->name('email-templates.show');
    Route::get('/email-templates/{key}/edit', [EmailTemplateController::class, 'edit'])->name('email-templates.edit');
    Route::put('/email-templates/{key}', [EmailTemplateController::class, 'update'])->name('email-templates.update');
    Route::delete('/email-templates/{emailTemplate}', [EmailTemplateController::class, 'destroy'])->name('email-templates.destroy');
});
