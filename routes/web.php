<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\JudgeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');
Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/table', function () {
    return view('table');
});

// Route::get('/event', function () {
//     return view('admin.events.index');
// });

// Route::resource('/events', EventController::class);

// Route::get('/events/create', function () {
//     return view('admin.events.create');
// })->name('admin.events.create');

// List all events
Route::get('/events', [EventController::class, 'index'])->name('admin.events.index');

// Show the form for creating a new event
Route::get('/events/create', [EventController::class, 'create'])->name('admin.events.create');

// Store a new event
Route::post('/events', [EventController::class, 'store'])->name('admin.events.store');

// Show a specific event
Route::get('/events/{event}', [EventController::class, 'show'])->name('admin.events.show');

// Show the form for editing a specific event
Route::get('/events/{event}/edit', [EventController::class, 'edit']);

// Update a specific event
Route::put('/events/{event}', [EventController::class, 'update'])->name('admin.events.update');

// Delete a specific event
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');


// List all judges
Route::get('/judges', [JudgeController::class, 'index'])->name('admin.judges.index');

// Show the form for creating a new judge
Route::get('/judges/create', [JudgeController::class, 'create'])->name('admin.judges.create');

// Store a new judge
Route::post('/judges', [JudgeController::class, 'store'])->name('admin.judges.store');

// Show a specific judge
Route::get('/judges/{judge}', [JudgeController::class, 'show']);

// Show the form for editing a specific judge
Route::get('/judges/{judge}/edit', [JudgeController::class, 'edit']);

// Update a specific judge
Route::put('/judges/{judge}', [JudgeController::class, 'update']);

// Delete a specific judge
Route::delete('/judges/{judge}', [JudgeController::class, 'destroy'])->name('admin.judges.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
