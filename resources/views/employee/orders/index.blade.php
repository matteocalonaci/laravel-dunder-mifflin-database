@extends('layouts.app')

@section('content')
<div class="container">
    <h1>I tuoi ordini</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID Ordine</th>
                <th>Data</th>
                <th>Quantità</th>
                <th>Prodotto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ \Carbon\Carbon::parse($order->Order_Date)->format('d/m/Y') }}</td> <!-- Formatta la data -->
                <td>{{ $order->Quantity }}</td>
                <td>{{ $order->product->Product_Name ?? 'N/A' }}</td> <!-- Usa l'operatore null coalescing per gestire i casi in cui il prodotto non esiste -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
