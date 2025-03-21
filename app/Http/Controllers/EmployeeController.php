<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function statistics()
    {
        // Ottieni la data di inizio e fine del mese corrente
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Ottieni l'ID del dipartimento Vendite
        $salesDepartmentId = Department::where('Department_Name', 'Vendite')->value('id');

        // Controlla se il dipartimento Vendite esiste
        if (!$salesDepartmentId) {
            return redirect()->back()->with('error', 'Dipartimento Vendite non trovato.');
        }

        // Ottieni solo i dipendenti del dipartimento Vendite
        $employees = Employee::with(['orders.product', 'orders.customer'])
            ->where('ID_Department', $salesDepartmentId)
            ->get()
            ->map(function ($employee) use ($startOfMonth, $endOfMonth) {
                // Filtra gli ordini del mese corrente
                $sales = $employee->orders->filter(function ($order) use ($startOfMonth, $endOfMonth) {
                    return $order->Order_Date >= $startOfMonth && $order->Order_Date <= $endOfMonth;
                });

                // Calcola la quantità totale e il profitto totale
                $totalQuantity = $sales->sum('Quantity');
                $totalProfit = $sales->sum(function ($order) {
                    return $order->Quantity * $order->product->price;
                });

                return [
                    'employee' => $employee,
                    'totalQuantity' => $totalQuantity,
                    'totalProfit' => $totalProfit,
                ];
            })
            ->sortByDesc('totalProfit')
            ->values();

        return view('admin.statistics.index', compact('employees'));
    }
    public function index()
    {
        // Controlla se l'utente autenticato è un admin
        if (Auth::user()->role === 'admin') {
            // Ottieni tutti i dipendenti con i loro dipartimenti, paginati
            $employees = Employee::with('department')->paginate(8); // Modifica il numero 10 con il numero di dipendenti per pagina che desideri
            return view('admin.employees.index', compact('employees'));
        }

        // Se non è un admin, mostra solo il profilo dell'utente autenticato
        return redirect('/')->with('error', 'Accesso non autorizzato.');
    }


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
            'ID_Department' => 'required|integer|exists:departments,id',
            'Phone' => 'required|string|max:15',
            'Email' => 'required|email|unique:employees,email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hired_at' => 'required|date', // Aggiungi la validazione per la data di assunzione
        ]);

        // Gestisci il caricamento dell'immagine
        $imagePath = $request->file('image')->store('images', 'public');

        // Crea un nuovo utente
        $user = User::create([
            'name' => $request->First_Name . ' ' . $request->Last_Name,
            'email' => $request->Email,
            'password' => Hash::make('dundermifflin'), // Imposta una password di default o generala
            'role' => 'employee' // Imposta il ruolo se necessario
        ]);

        // Creazione del nuovo dipendente
        Employee::create([
            'ID_User' => $user->id, // Usa l'ID dell'utente appena creato
            'First_Name' => $request->First_Name,
            'Last_Name' => $request->Last_Name,
            'ID_Department' => $request->ID_Department,
            'ID_Office' => 1, // Imposta l'ID dell'ufficio a 1
            'Phone' => $request->Phone,
            'Email' => $request->Email,
            'image' => $imagePath,
            'hired_at' => $request->hired_at, // Aggiungi la data di assunzione
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'Dipendente creato con successo.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // Carica gli ordini, i prodotti e i clienti associati
        $employee->load(['orders.product', 'orders.customer']);

        // Ottieni la data di inizio e fine del mese corrente
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Filtra gli ordini del mese corrente
        $sales = $employee->orders->filter(function ($order) use ($startOfMonth, $endOfMonth) {
            return $order->Order_Date >= $startOfMonth && $order->Order_Date <= $endOfMonth;
        });

        // Aggiungi questo per controllare gli ordini filtrati

        // Calcola la quantità totale e il profitto totale
        $totalQuantity = $sales->sum('Quantity');
        $totalProfit = $sales->sum(function ($order) {
            return $order->Quantity * $order->product->price;
        });

        // Mostra i dettagli di un dipendente specifico
        return view('admin.employees.show', compact('employee', 'totalQuantity', 'totalProfit'));
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
    // Validazione dei dati
    $request->validate([
        'Email' => 'required|email',
        'Phone' => 'required|string|max:15',
        'ID_Department' => 'required|exists:departments,id', // Assicurati che il dipartimento esista
        'hired_at' => 'required|date', // Aggiungi la validazione per la data di assunzione
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validazione dell'immagine (opzionale)
    ]);

    // Aggiorna i dettagli del dipendente
    $employee->update([
        'Email' => $request->Email,
        'Phone' => $request->Phone,
        'ID_Department' => $request->ID_Department,
        'hired_at' => $request->hired_at, // Aggiorna la data di assunzione
    ]);

    // Gestisci il caricamento dell'immagine se fornita
    if ($request->hasFile('image')) {
        // Gestisci il caricamento dell'immagine
        $imagePath = $request->file('image')->store('images', 'public');
        $employee->update(['image' => $imagePath]); // Aggiorna il percorso dell'immagine
    }

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

    public function showProfile()
    {
        // Ottieni l'utente autenticato
        $user = Auth::user();

        // Trova il dipendente associato all'utente
        $employee = $user->employee;

        // Controlla se il dipendente esiste
        if (!$employee) {
            return redirect('/')->with('error', 'Profilo non trovato.');
        }

        // Logga informazioni utili
        Log::info('Accesso al profilo dell\'employee con ID: ' . $employee->id);
        Log::info('Percorso immagine: ' . $employee->image);

        return view('employee.employees.profile', compact('employee'));
    }
}


