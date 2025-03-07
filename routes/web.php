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
// Gruppo di rotte protette da autenticazione per admin
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard'); // Mostra la dashboard dell'admin
        })->name('dashboard');

        Route::resource('employees', EmployeeController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('offices', OfficeController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::get('statistics', [EmployeeController::class, 'statistics'])->name('statistics.index');
    });

// Gruppo di rotte protette da autenticazione per employee
Route::middleware(['auth', 'role:employee'])
    ->prefix('employee')
    ->name('employee.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('employee.dashboard');
        })->name('dashboard');

        Route::get('/profile', [EmployeeController::class, 'showProfile'])->name('profile');
        Route::get('/orders', [EmployeeController::class, 'showOrders'])->name('orders.index');
        Route::get('/orders/{order}/edit', [EmployeeController::class, 'editOrder'])->name('orders.edit');
        Route::put('/orders/{order}', [EmployeeController::class, 'updateOrder'])->name('orders.update');
        Route::get('/orders/create', [EmployeeController::class, 'createOrder'])->name('orders.create');
        Route::post('/orders', [EmployeeController::class, 'storeOrder'])->name('orders.store');
    });
// Includi le rotte di autenticazione
require __DIR__ . '/auth.php';
