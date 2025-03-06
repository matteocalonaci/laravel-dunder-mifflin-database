<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Reindirizza in base al ruolo dell'utente
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.employees.index'); // Reindirizza a Gestisci Dipendenti
        } else {
            return redirect()->route('employee.profile'); // Reindirizza al Profilo
        }
    }
}
