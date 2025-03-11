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
        $customers = Customer::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        Customer::create($data);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Cliente creato con successo.');
    }

    // Funzioni per Employee
    public function employeeIndex()
    {
        $customers = Customer::where('employee_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('employee.customers.index', compact('customers'));
    }

    public function employeeCreate()
    {
        return view('employee.customers.create');
    }

    public function employeeStore(Request $request)
    {
        $data = $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        $data['employee_id'] = Auth::id();

        Customer::create($data);

        return redirect()->route('employee.customers.index')
            ->with('success', 'Cliente creato con successo.');
    }

    // Funzioni comuni (show, edit, update, destroy)
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'Customer_Name' => 'required|string|max:255',
            'Contact_Number' => 'required|string|max:15',
            'Address' => 'nullable|string|max:255',
        ]);

        $customer->update($data);

        return redirect()->back()->with('success', 'Cliente aggiornato con successo.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Cliente eliminato con successo.');
    }
}
