@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="text-white">Dettagli Ordine</h1>

        <div class="card">
            <div class="card-header">
                Ordine #{{ $order->id }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Data Ordine:</strong> {{ \Carbon\Carbon::parse($order->Order_Date)->format('d/m/Y') }}</p>
                        <p><strong>Dipendente:</strong> {{ $order->employee->First_Name }} {{ $order->employee->Last_Name }}</p>
                        <p><strong>Cliente:</strong> {{ $order->customer->Customer_Name ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Prezzo Unitario:</strong> €{{ number_format($order->product->price, 2) }}</p>
                        <p><strong>Quantità:</strong> {{ $order->Quantity }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Prodotto:</strong> {{ $order->product->Product_Name ?? 'N/A' }}</p>

                    </div>
                    <div class="col-md-6">
                        <p><strong>Prezzo Totale:</strong> €{{ number_format($order->Quantity * $order->product->price, 2) }}</p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                        <i class="fas fa-list"></i>
                    </a>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo ordine?');">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    .background-image {
        background-image: url('https://s.wsj.net/public/resources/images/MK-BQ669_DUNDER_G_20111127202517.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh; /* Copre l'intera altezza della finestra */
        display: flex;
        align-items: center; /* Centra verticalmente */
        justify-content: center; /* Centra orizzontalmente */
    }

    .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 20px;
        width: 100%; /* Assicura che la larghezza sia al 100% */
        max-width: 800px; /* Limita la larghezza massima per un layout più carino */
        margin: auto; /* Centra il contenitore */
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    h1 {
        margin-top: 0; /* Rimuove il margine superiore */
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }
</style>
