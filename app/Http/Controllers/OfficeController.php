<?php

namespace App\Http\Controllers;

use App\Models\Office; // Assicurati di avere un modello Office
use App\Models\Employee; // Modello Employee per gestire i dipendenti
use App\Models\Order; // Modello Order per gestire gli ordini
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    // Mostra la lista degli uffici
    public function index()
    {
        $offices = Office::all(); // Recupera tutti gli uffici
        return view('offices.index', compact('offices')); // Restituisce la vista con gli uffici
    }

    // Mostra il modulo per creare un nuovo ufficio
    public function create()
    {
        return view('offices.create'); // Restituisce la vista per creare un nuovo ufficio
    }

    // Salva un nuovo ufficio nel database
    public function store(Request $request)
    {
        $request->validate([
            'Office_Name' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
        ]);

        Office::create($request->all()); // Crea un nuovo ufficio
        return redirect()->route('offices.index')->with('success', 'Ufficio creato con successo.'); // Reindirizza alla lista degli uffici
    }

    // Mostra i dettagli di un ufficio specifico
    public function show($id)
    {
        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        $employees = Employee::where('ID_Office', $id)->get(); // Recupera i dipendenti associati all'ufficio
        $orders = Order::whereHas('employee', function($query) use ($id) {
            $query->where('ID_Office', $id);
        })->get(); // Recupera gli ordini effettuati dai dipendenti di questo ufficio

        return view('offices.show', compact('office', 'employees', 'orders')); // Restituisce la vista con i dettagli dell'ufficio, i dipendenti e gli ordini
    }

    // Mostra il modulo per modificare un ufficio esistente
    public function edit($id)
    {
        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        return view('offices.edit', compact('office')); // Restituisce la vista per modificare l'ufficio
    }

    // Aggiorna un ufficio esistente nel database
    public function update(Request $request, $id)
    {
        $request->validate([
            'Office_Name' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
        ]);

        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        $office->update($request->all()); // Aggiorna l'ufficio
        return redirect()->route('offices.index')->with('success', 'Ufficio aggiornato con successo.'); // Reindirizza alla lista degli uffici
    }

    // Elimina un ufficio dal database
    public function destroy($id)
    {
        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        $office->delete(); // Elimina l'ufficio
        return redirect()->route('offices.index')->with('success', 'Ufficio eliminato con successo.'); // Reindirizza alla lista degli uffici
    }
}
