<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('events', EventController::class);

Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');


Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
