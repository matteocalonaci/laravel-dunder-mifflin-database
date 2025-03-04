<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni tutti i dipartimenti con paginazione
        $departments = Department::paginate(10);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'Department_Name' => 'required|string|max:255',
            'ID_Office' => 'required|integer|exists:offices,id', // Assicurati che l'ID dell'ufficio esista
            'Number_of_Employees' => 'nullable|integer|min:0',
        ]);

        // Crea un nuovo dipartimento
        Department::create($request->all());

        return redirect()->route('admin.departments.index')->with('success', 'Dipartimento creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        // Validazione dei dati
        $request->validate([
            'Department_Name' => 'required|string|max:255',
            'ID_Office' => 'required|integer|exists:offices,id', // Assicurati che l'ID dell'ufficio esista
            'Number_of_Employees' => 'nullable|integer|min:0',
        ]);

        // Aggiorna il dipartimento
        $department->update($request->all());

        return redirect()->route('admin.departments.index')->with('success', 'Dipartimento aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Dipartimento eliminato con successo.');
    }
}
