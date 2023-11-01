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

Route::get('/createTicket', [TicketController::class, 'createTicketForm'])
    ->middleware(['auth', 'verified'])
    ->name('createTicket');

Route::get('/newUser', [TicketController::class, 'createTicket'])
    ->middleware(['auth', 'verified'])
    ->name('newUser');

Route::get('/paramsSystem', [TicketController::class, 'createTicket'])
    ->middleware(['auth', 'verified'])
    ->name('paramsSystem');

Route::post('/createTicket', [TicketController::class, 'createTicket'])
    ->middleware(['auth', 'verified'])
    ->name('createTicket');

Route::get('/viewId/{protocol}', [TicketController::class, 'viewTicketById'])
    ->middleware(['auth', 'verified'])
    ->name('view-ticket-by-id');

Route::get('/deletarTicket/{protocol}', [TicketController::class, 'deletarTicket'])
    ->middleware(['auth', 'verified'])
    ->name('deletar_ticket');

Route::get('/editarTicket/{protocol}', [TicketController::class, 'editarTicketForm'])
    ->middleware(['auth', 'verified'])
    ->name('editar_ticket');

Route::put('/updateTicket/{id}', [TicketController::class, 'updateTicket'])
    ->middleware(['auth', 'verified'])
    ->name('updateTicket');

Route::get('/encerrarTicketForm/{protocol}', [TicketController::class, 'encerrarTicketForm'])
    ->middleware(['auth', 'verified'])
    ->name('encerrarTicketForm');

Route::post('/encerrarTicket/{protocol}', [TicketController::class, 'encerrarTicket'])
    ->middleware(['auth', 'verified'])
    ->name('encerrarTicket');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
