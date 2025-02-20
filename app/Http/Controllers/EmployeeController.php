<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Controlla se l'utente autenticato è un admin
        if (Auth::user()->role === 'admin') {
            // Ottieni tutti i dipendenti con i loro dipartimenti, paginati
            $employees = Employee::with('department')->paginate(9); // Modifica il numero 10 con il numero di dipendenti per pagina che desideri
            return view('admin.employees.index', compact('employees'));
        }

        // Se non è un admin, mostra solo il profilo dell'utente autenticato
        return redirect('/')->with('error', 'Accesso non autorizzato.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra il modulo per creare un nuovo dipendente (solo per admin)
        if (Auth::check() && Auth::user()->role === 'admin') {
            $departments = Department::all(); // Get all departments
            return view('admin.employees.create', compact('departments'));
        }

        return redirect('/')->with('error', 'Accesso non autorizzato.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'First_Name' => 'required|string|max:255',
            'Last_Name' => 'required|string|max:255',
            'ID_Department' => 'required|integer|exists:departments,id', // Ensure the department exists
            'Phone' => 'required|string|max:15',
            'Email' => 'required|email|unique:employees,email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validazione dell'immagine
        ]);

        // Gestisci il caricamento dell'immagine
        $imagePath = $request->file('image')->store('images', 'public');

        // Creazione del nuovo dipendente
        Employee::create([
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'ID_Department' => $request->ID_Department,
            'ID_Office' => 1, // Imposta l'ID dell'ufficio a 1
            'Phone' => $request->Phone,
            'Email' => $request->Email,
            'image' => $imagePath, // Salva il percorso dell'immagine
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'Dipendente creato con successo.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['orders.product', 'orders.customer']);
        // Mostra i dettagli di un dipendente specifico
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
// app/Http/Controllers/EmployeeController.php

public function edit(Employee $employee)
{
    // Get all departments to populate the dropdown
    $departments = Department::all();
    return view('admin.employees.edit', compact('employee', 'departments'));
}

public function update(Request $request, Employee $employee)
{
    $request->validate([
        'Email' => 'required|email',
        'Phone' => 'required|string|max:15',
        'ID_Department' => 'required|exists:departments,id', // Ensure the department exists
    ]);

    // Update the employee's details
    $employee->update([
        'Email' => $request->Email,
        'Phone' => $request->Phone,
        'ID_Department' => $request->ID_Department,
    ]);

    return redirect()->route('admin.employees.index')->with('success', 'Dettagli dipendente aggiornati con successo.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // Elimina il dipendente (solo per admin)
        if (Auth::check() && Auth::user()->role === 'admin') {
            $employee->delete();
            return redirect()->route('admin.employees.index')->with('success', 'Dipendente eliminato con successo.');
        }

        return redirect('/')->with('error', 'Accesso non autorizzato.');
    }
}
