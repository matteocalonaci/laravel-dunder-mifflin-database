<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Funzioni per Admin
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);


        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('employee.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        // Associa il cliente all'employee autenticato
        $data['employee_id'] = Auth::id();

        Customer::create($data);

        return redirect()->route('employee.customers.index')
            ->with('success', 'Cliente creato con successo.');
    }
    // Funzioni per Employee
    public function employeeIndex()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);


        return view('employee.customers.index', compact('customers'));
    }

    public function employeeCreate()
    {
        return view('employee.customers.create'); // Assicurati che questa vista esista
    }
    public function employeeStore(Request $request)
    {
        $data = $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        // Associa il cliente all'employee autenticato
        $data['employee_id'] = Auth::id();

        Customer::create($data);

        return redirect()->route('employee.customers.index') // Assicurati di reindirizzare qui
            ->with('success', 'Cliente creato con successo.');
    }

    // Funzioni comuni (show, edit, update, destroy)
    public function show(Customer $customer)
    {
        // Verifica se l'utente ha accesso al cliente
        if (Auth::user()->role === 'admin' || $customer->employee_id === Auth::id()) {
            return view('emloyee.customers.show', compact('customer'));
        }

        return redirect()->route('employee.customers.index')->with('error', 'Accesso non autorizzato.');
    }

    public function edit(Customer $customer)
    {
        // Verifica se l'utente ha accesso al cliente
        if (Auth::user()->role === 'admin' || $customer->employee_id === Auth::id()) {
            return view('employee.customers.edit', compact('customer'));
        }

        return redirect()->route('employee.customers.index')->with('error', 'Accesso non autorizzato.');
    }

    public function update(Request $request, Customer $customer)
    {
        // Verifica se l'utente ha accesso al cliente
        if (Auth::user()->role !== 'admin' && $customer->employee_id !== Auth::id()) {
            return redirect()->route('employee.customers.index')->with('error', 'Accesso non autorizzato.');
        }

        // Validazione dei dati
        $data = $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        // Aggiorna il cliente
        $customer->update($data);

        // Reindirizza alla lista dei clienti con un messaggio di successo
        return redirect()->route('employee.customers.index')->with('success', 'Cliente aggiornato con successo.');
    }

    public function destroy(Customer $customer)
    {
        // Verifica se l'utente ha accesso al cliente
        if (Auth::user()->role === 'admin' || $customer->employee_id === Auth::id()) {
            $customer->delete();
            return redirect()->back()->with('success', 'Cliente eliminato con successo.');
        }

        return redirect()->route('employee.customers.index')->with('error', 'Accesso non autorizzato.');
    }
}
