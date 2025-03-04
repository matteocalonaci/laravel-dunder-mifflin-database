<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController; // Importa il CustomerController
use App\Http\Controllers\DepartmentController; // Importa il DepartmentController
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rotta per la home
Route::get('/', function () {
    return view('welcome');
});

// Disabilita la registrazione
Auth::routes(['register' => false]);

// Reindirizza gli utenti che tentano di accedere alla pagina di registrazione
Route::get('/register', function () {
    return redirect('/');
});

// Gruppo di rotte protette da autenticazione per admin
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('employees', EmployeeController::class); // Admin può gestire i dipendenti
        Route::resource('orders', OrderController::class); // Admin può gestire gli ordini
        Route::resource('offices', OfficeController::class); // Admin può gestire gli uffici
        Route::resource('customers', CustomerController::class); // Admin può gestire i clienti
        Route::resource('departments', DepartmentController::class); // Admin può gestire i dipartimenti
        Route::resource('suppliers', SupplierController::class);
        Route::get('statistics', [EmployeeController::class, 'statistics'])->name('statistics.index');
    });

// Gruppo di rotte protette da autenticazione per employee
Route::middleware(['auth', 'role:employee'])
    ->prefix('employee')
    ->name('employee.')
    ->group(function () {
        Route::get('/profile', [EmployeeController::class, 'showProfile'])->name('profile'); // Visualizza il profilo dell'employee
        Route::get('/orders', [EmployeeController::class, 'showOrders'])->name('orders.index'); // Visualizza solo gli ordini dell'employee
        Route::get('/orders/{order}/edit', [EmployeeController::class, 'editOrder'])->name('orders.edit'); // Modifica ordine
        Route::put('/orders/{order}', [EmployeeController::class, 'updateOrder'])->name('orders.update'); // Aggiorna ordine
        Route::get('/orders/create', [EmployeeController::class, 'createOrder'])->name('orders.create'); // Mostra il modulo di creazione
        Route::post('/orders', [EmployeeController::class, 'storeOrder'])->name('orders.store'); // Salva il nuovo ordine
    });

// Includi le rotte di autenticazione
require __DIR__ . '/auth.php';
