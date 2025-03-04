<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni tutti i clienti ordinati per data di creazione (dal più recente al meno recente) con paginazione
        $customers = Customer::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.customers.index', compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        // Crea un nuovo cliente
        Customer::create($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Cliente creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Validazione dei dati
        $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        // Aggiorna il cliente
        $customer->update($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Cliente aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Cliente eliminato con successo.');
    }
}
