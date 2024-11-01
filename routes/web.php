<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EsEntryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;



Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/tag/{tag}', [TaskController::class, 'filterByTag'])->name('tasks.filterByTag');

Route::get('/es-entries', [EsEntryController::class, 'index'])->name('es_entries.index');
Route::post('/es-entries', [EsEntryController::class, 'store'])->name('es_entries.store');
Route::delete('/es-entries/{id}', [EsEntryController::class, 'destroy'])->name('es_entries.destroy');

Route::get('/es-entries/{id}/edit', [EsEntryController::class, 'edit'])->name('es_entries.edit');
Route::put('/es-entries/{id}', [EsEntryController::class, 'update'])->name('es_entries.update');

Route::resource('entries', EntryController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');

