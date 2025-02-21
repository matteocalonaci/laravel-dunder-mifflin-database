<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Mostra la lista degli ordini
    public function index()
    {
        $orders = Order::with(['employee', 'customer', 'product'])->paginate(9); // Recupera tutti gli ordini con le relazioni e li pagina
        return view('admin.orders.index', compact('orders')); // Restituisce la vista con gli ordini
    }

    // Mostra il modulo per creare un nuovo ordine
    public function create()
    {
        $employees = Employee::all(); // Recupera tutti i dipendenti
        $customers = Customer::all(); // Recupera tutti i clienti
        $products = Product::all(); // Recupera tutti i prodotti
        return view('admin.orders.create', compact('employees', 'customers', 'products')); // Restituisce la vista per creare un nuovo ordine
    }

    // Salva un nuovo ordine nel database
    public function store(Request $request)
    {
        $request->validate([
            'Order_Date' => 'required|date',
            'ID_User' => 'required|exists:employees,ID_User',
            'ID_Customer' => 'required|exists:customers,id',
            'ID_Product' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
        ]);

        Order::create($request->all()); // Crea un nuovo ordine
        return redirect()->route('admin.orders.index')->with('success', 'Ordine creato con successo.'); // Reindirizza alla lista degli ordini
    }

    // Mostra i dettagli di un ordine specifico
    public function show($id)
    {
        $order = Order::with(['employee', 'customer', 'product'])->findOrFail($id); // Trova l'ordine per ID con le relazioni
        return view('admin.orders.show', compact('order')); // Restituisce la vista con i dettagli dell'ordine
    }

    // Mostra il modulo per modificare un ordine esistente
    public function edit($id)
    {
        $order = Order::findOrFail($id); // Trova l'ordine per ID
        $employees = Employee::all(); // Recupera tutti i dipendenti
        $customers = Customer::all(); // Recupera tutti i clienti
        $products = Product::all(); // Recupera tutti i prodotti
        return view('admin.orders.edit', compact('order', 'employees', 'customers', 'products')); // Restituisce la vista per modificare l'ordine
    }

    // Aggiorna un ordine esistente nel database
    public function update(Request $request, $id)
    {
        $request->validate([
            'Order_Date' => 'required|date',
            'ID_User' => 'required|exists:employees,ID_User',
            'ID_Customer' => 'required|exists:customers,id',
            'ID_Product' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id); // Trova l'ordine per ID
        $order->update($request->all()); // Aggiorna l'ordine
        return redirect()->route('admin.orders.index')->with('success', 'Ordine aggiornato con successo.'); // Reindirizza alla lista degli ordini
    }

    // Elimina un ordine dal database
    public function destroy($id)
    {
        $order = Order::findOrFail($id); // Trova l'ordine per ID
        $order->delete(); // Elimina l'ordine
        return redirect()->route('admin.orders.index')->with('success', 'Ordine eliminato con successo.'); // Reindirizza alla lista degli ordini
    }
}
