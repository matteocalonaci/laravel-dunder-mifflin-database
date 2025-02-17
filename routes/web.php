<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
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

// Rotta per la home
Route::get('/', function () {
    return view('welcome');
});

// Disabilita la registrazione
Auth::routes(['register' => false]); // Disabilita la registrazione

// Reindirizza gli utenti che tentano di accedere alla pagina di registrazione
Route::get('/register', function () {
    return redirect('/'); // Reindirizza alla home
});

// Gruppo di rotte protette da autenticazione
Route::middleware(['auth'])
    ->prefix('admin') // Definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') // Definisce il pattern con cui generare i nomi delle rotte
    ->group(function () {
        // Rotta per il dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

// Includi le rotte di autenticazione
require __DIR__ . '/auth.php';
