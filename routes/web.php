<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EmployeeController; // Assicurati di importare il controller dei dipendenti
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Qui puoi registrare le rotte web per la tua applicazione. Queste
| rotte vengono caricate dal RouteServiceProvider e tutte saranno
| assegnate al gruppo middleware "web". Fai qualcosa di grande!
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

        // Rotte per gestire i dipendenti
        Route::resource('employees', EmployeeController::class); // Aggiungi le rotte CRUD per i dipendenti

        // Rotte per gestire gli ordini
        Route::resource('orders', OrderController::class); // Aggiungi le rotte CRUD per gli ordini

        // Rotte per gestire gli uffici
        Route::resource('offices', OfficeController::class); // Aggiungi le rotte CRUD per gli uffici

        // Rotta per le statistiche
        Route::get('statistics', [EmployeeController::class, 'statistics'])->name('statistics.index'); // Aggiungi la rotta per le statistiche
    });

// Includi le rotte di autenticazione
require __DIR__ . '/auth.php';
