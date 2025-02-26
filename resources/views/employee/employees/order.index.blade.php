@extends('layouts.app')

@section('content')
<div class="container">
    <h1>I tuoi ordini</h1>
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
                <td>{{ $order->Order_Date }}</td>
                <td>{{ $order->Quantity }}</td>
                <td>{{ $order->product->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
