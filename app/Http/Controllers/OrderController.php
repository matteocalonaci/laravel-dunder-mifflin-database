<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product; // Assicurati di importare il modello Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Visualizza gli ordini per l'amministratore
    public function indexAdmin()
    {
        $orders = Order::with(['customer', 'product', 'employee']) // Carica le relazioni
        ->orderBy('Order_Date', 'desc')
            ->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Visualizza gli ordini per l'impiegato
    public function userOrders()
    {
        $orders = Order::where('ID_User', Auth::id()) // Filtra per l'ID dell'utente autenticato
            ->with(['customer', 'product']) // Carica le relazioni
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('employee.orders.index', compact('orders'));
    }

    // Mostra il modulo per creare un nuovo ordine
    public function create()
    {
        $customers = Customer::all(); // Recupera tutti i clienti
        $products = Product::all(); // Recupera tutti i prodotti
        return view('employee.orders.create', compact('customers', 'products'));
    }

    // Salva un nuovo ordine
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'ID_Customer' => 'required|exists:customers,id',
            'ID_Product' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
            'Order_Date' => 'required|date',
        ]);

        // Creazione dell'ordine
        Order::create([
            'ID_Customer' => $request->ID_Customer,
            'ID_Product' => $request->ID_Product,
            'Quantity' => $request->Quantity,
            'Order_Date' => $request->Order_Date,
            'ID_User' => Auth::id(), // Associa l'ordine all'utente autenticato
        ]);

        return redirect()->route('employee.orders.index')->with('success', 'Ordine creato con successo.');
    }

    // Mostra il modulo per modificare un ordine
    public function edit(Order $order)
    {
        $customers = Customer::all(); // Recupera tutti i clienti
        $products = Product::all(); // Recupera tutti i prodotti
        return view('employee.orders.edit', compact('order', 'customers', 'products'));
    }

    // Aggiorna un ordine
    public function update(Request $request, Order $order)
    {
        // Validazione dei dati
        $request->validate([
            'ID_Customer' => 'required|exists:customers,id',
            'ID_Product' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
            'Order_Date' => 'required|date',
        ]);

        // Aggiornamento dell'ordine
        $order->update([
            'ID_Customer' => $request->ID_Customer,
            'ID_Product' => $request->ID_Product,
            'Quantity' => $request->Quantity,
            'Order_Date' => $request->Order_Date,
        ]);

        return redirect()->route('employee.orders.index')->with('success', 'Ordine aggiornato con successo.');
    }

    // Elimina un ordine
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('employee.orders.index')->with('success', 'Ordine eliminato con successo.');
    }
}
