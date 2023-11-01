<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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
});

Route::get('/dashboard', [TicketController::class, 'ticketAll'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/createTicket', [TicketController::class, 'createTicket'])
    ->middleware(['auth', 'verified'])
    ->name('createTicket');

Route::get('/newUser', [TicketController::class, 'createTicket'])
    ->middleware(['auth', 'verified'])
    ->name('newUser');
    
Route::get('/paramsSystem', [TicketController::class, 'createTicket'])
    ->middleware(['auth', 'verified'])
    ->name('paramsSystem');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
