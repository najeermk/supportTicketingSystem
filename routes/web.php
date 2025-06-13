<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTicketController;

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

Route::get('/', [TicketController::class, 'index']);
Route::post('/support', [TicketController::class, 'store'])->name('tickets.store');

// Auth
Route::get('/admin', [AdminUserController::class, 'showLoginForm']);
Route::post('/admin/login', [AdminUserController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminUserController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('/admin/tickets/{department}/{id}', [AdminTicketController::class, 'show'])->name('admin.tickets.show');
    Route::post('/admin/tickets/{department}/{id}/note', [AdminTicketController::class, 'addNote'])->name('admin.tickets.note');
});
