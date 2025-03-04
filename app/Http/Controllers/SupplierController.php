<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni tutti i fornitori con paginazione
        $suppliers = Supplier::paginate(8);
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'Supplier_Name' => 'required|string|max:255',
            'Contact_Info' => 'required|string|max:20',
            'Products_Offered' => 'nullable|string|max:255',
        ]);

        // Crea un nuovo fornitore
        Supplier::create($validatedData);

        return redirect()->route('admin.suppliers.index')->with('success', 'Fornitore creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('admin.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Aggiorna il fornitore
        $supplier->update($validatedData);

        return redirect()->route('admin.suppliers.index')->with('success', 'Fornitore aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Fornitore eliminato con successo.');
    }
}
