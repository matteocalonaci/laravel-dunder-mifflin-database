<?php

namespace App\Http\Controllers;

use App\Models\Office; // Assicurati di avere un modello Office
use App\Models\Employee; // Modello Employee per gestire i dipendenti
use App\Models\Order; // Modello Order per gestire gli ordini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    // Mostra la lista degli uffici
    public function index()
    {
        $offices = Office::all(); // Recupera tutti gli uffici
        return view('admin.offices.index', compact('offices')); // Restituisce la vista con gli uffici
    }

    // Mostra il modulo per creare un nuovo ufficio
    public function create()
    {
        return view('admin.offices.create'); // Restituisce la vista per creare un nuovo ufficio
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'image' => 'nullable|image|max:2048',
        'Office_Name' => 'required|string|max:255',
        'Location' => 'required|string|max:255',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('employee_images', 'public');
    }

    Employee::create($data);
    return redirect()->route('employees.index');
}

    // Mostra i dettagli di un ufficio specifico
    public function show($id)
    {
        $office = Office::findOrFail($id);
        $employees = Employee::where('ID_Office', $id)->get()->map(function($employee) {
            $employee->image_url = filter_var($employee->image, FILTER_VALIDATE_URL)
                ? $employee->image
                : asset('storage/' . $employee->image);
            return $employee;
        });

        return view('admin.offices.show', compact('office', 'employees'));
    }

    // Mostra il modulo per modificare un ufficio esistente
    public function edit($id)
    {
        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        return view('admin.offices.edit', compact('office')); // Restituisce la vista per modificare l'ufficio
    }

    // Aggiorna un ufficio esistente nel database
    public function update(Request $request, $id)
    {
        $request->validate([
            'Office_Name' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        $office->update($request->all()); // Aggiorna l'ufficio
        return redirect()->route('admin.offices.index')->with('success', 'Ufficio aggiornato con successo.'); // Reindirizza alla lista degli uffici
    }

    // Elimina un ufficio dal database
    public function destroy($id)
    {
        $office = Office::findOrFail($id); // Trova l'ufficio per ID
        $office->delete(); // Elimina l'ufficio
        return redirect()->route('admin.offices.index')->with('success', 'Ufficio eliminato con successo.'); // Reindirizza alla lista degli uffici
    }
}
