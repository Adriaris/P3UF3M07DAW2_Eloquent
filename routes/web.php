<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [EventController::class, 'home'])->middleware('auth');
Route::get('/events', [EventController::class, 'index'])->middleware('auth');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::post('/events', [EventController::class, 'store'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show')->middleware('auth');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit')->middleware('auth');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update')->middleware('auth');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth');


Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register')->middleware('auth');
Route::post('/events/add_user/{id}', [EventController::class, 'addUser'])->name('events.add_user')->middleware('auth');

Auth::routes(); //Registra las rutas de autenticación predeterminadas de Laravel, incluyendo 
                //las rutas para el inicio de sesión, registro, cierre de sesión, etc.


