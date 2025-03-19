<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rotta principale
Route::get('/', function () {
    return view('welcome');
});

// Autenticazione
Auth::routes(['register' => false]);
Route::get('/register', function () {
    return redirect('/');
});

// Area Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('employees', EmployeeController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('customers', CustomerController::class); // Customer completo per admin
        Route::resource('departments', DepartmentController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('offices', OfficeController::class);

        Route::get('statistics', [EmployeeController::class, 'statistics'])->name('statistics.index');
    });

// Area Employee
Route::middleware(['auth', 'role:employee'])
    ->prefix('employee')
    ->name('employee.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', function () {
            return view('employee.dashboard');
        })->name('dashboard');

        // Profilo
        Route::get('/profile', [EmployeeController::class, 'showProfile'])->name('profile');

        // Ordini
        Route::get('orders', [OrderController::class, 'userOrders'])->name('orders.index'); // Rotta per gli ordini del dipendente
        Route::resource('orders', OrderController::class)->only(['create', 'store', 'edit', 'update', 'show']);
        Route::get('customers', [CustomerController::class, 'employeeIndex'])->name('customers.index'); // Rotta per l'indice dei clienti
        Route::resource('customers', CustomerController::class)->except(['index']); // Escludi l'indice dalla risorsa
    });

require __DIR__ . '/auth.php';
