<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Mostra la lista degli ordini per admin
    public function index()
    {
        // Recupera tutti gli ordini con le relazioni e li pagina, ordinati dal più recente al più vecchio
        $orders = Order::with(['employee', 'customer', 'product'])
            ->orderBy('Order_Date', 'desc') // Ordina per data dell'ordine in modo decrescente
            ->paginate(9); // Paginazione con 9 ordini per pagina

        return view('admin.orders.index', compact('orders')); // Restituisce la vista con gli ordini
    }

    // Mostra la lista degli ordini per il dipendente
    public function userOrders()
    {
        $user = Auth::user();

        // Assicurati che l'utente abbia un dipendente associato
        if (!$user->employee) {
            return redirect()->back()->with('error', 'Profilo dipendente non trovato.');
        }

        // Recupera solo gli ordini associati all'ID del venditore autenticato, ordinati dal più recente al più vecchio
        $orders = $user->employee->orders()
            ->with('product', 'customer') // Carica anche i dettagli del prodotto e del cliente
            ->orderBy('Order_Date', 'desc') // Ordina per data dell'ordine in modo decrescente
            ->paginate(9); // Paginazione con 9 ordini per pagina

        return view('employee.orders.index', compact('orders'));
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
        $this->validateOrder($request); // Usa un metodo privato per la validazione

        // Crea un nuovo ordine e imposta l'ID dell'utente autenticato
        Order::create([
            'Order_Date' => $request->Order_Date,
            'Quantity' => $request->Quantity,
            'ID_User' => Auth::user()->employee->ID_User, // Imposta l'ID dell'utente autenticato
            'ID_Customer' => $request->ID_Customer,
            'ID_Product' => $request->ID_Product,
        ]);

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

    // Aggiorna un ordine esistente
    public function update(Request $request, $id)
    {
        $this->validateOrder($request); // Usa un metodo privato per la validazione

        $order = Order::findOrFail($id); // Trova l'ordine per ID
        try {
            $order->update($request->all()); // Aggiorna l'ordine
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Errore durante l\'aggiornamento dell\'ordine: ' . $e->getMessage());
        }

        return redirect()->route('admin.orders.index')->with('success', 'Ordine aggiornato con successo.'); // Reindirizza alla lista degli ordini
    }

    // Elimina un ordine dal database
    public function destroy($id)
    {
        $order = Order::findOrFail($id); // Trova l'ordine per ID
        $order->delete(); // Elimina l'ordine
        return redirect()->route('admin.orders.index')->with('success', 'Ordine eliminato con successo.'); // Reindirizza alla lista degli ordini
    }

    // Metodo privato per la validazione dell'ordine
    private function validateOrder(Request $request)
    {
        $request->validate([
            'Order_Date' => 'required|date',
            'ID_User' => 'required|exists:employees,ID_User',
            'ID_Customer' => 'required|exists:customers,id',
            'ID_Product' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
        ]);
    }

    // Mostra il report delle vendite
    public function salesReport()
    {
        // Ottieni la data di inizio e fine del mese corrente
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Recupera solo gli ordini del mese corrente con i dettagli del prodotto
        $orders = Order::with('product')
            ->whereBetween('Order_Date', [$startOfMonth, $endOfMonth]) // Filtra per data
            ->get();

        // Calcola la somma totale delle vendite
        $totalSales = $orders->sum(function ($order) {
            return $order->Quantity * $order->product->price; // Moltiplica la quantità per il prezzo del prodotto
        });

        return view('admin.sales.index', compact('orders', 'totalSales')); // Restituisce la vista con il report delle vendite
    }
}
