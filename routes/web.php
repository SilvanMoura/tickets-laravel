<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DomainController;

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

Route::get('/paramsSystem', [DomainController::class, 'getDomains'])
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

Route::get('/createDomainForm', [DomainController::class, 'createDomainForm'])
    ->middleware(['auth', 'verified'])
    ->name('createDomainForm');

Route::post('/createDomain', [DomainController::class, 'createDomain'])
    ->middleware(['auth', 'verified'])
    ->name('createDomain');

Route::get('/getDomainId/{id}', [DomainController::class, 'getDomainId'])
    ->middleware(['auth', 'verified'])
    ->name('getDomainId');

Route::get('/deletarDomain/{id}', [DomainController::class, 'deletarDomain'])
    ->middleware(['auth', 'verified'])
    ->name('deletarDomain');

Route::get('/updateDomainForm/{id}', [DomainController::class, 'updateDomainForm'])
    ->middleware(['auth', 'verified'])
    ->name('updateDomainForm');

Route::put('/updateDomain/{id}', [DomainController::class, 'updateDomain'])
    ->middleware(['auth', 'verified'])
    ->name('updateDomain');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
