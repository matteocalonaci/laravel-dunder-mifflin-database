@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white">Modifica Ordine #{{ $order->id }}</h1>

        <div class="card">
            <div class="card-header">
                Modifica Dettagli Ordine
            </div>
            <div class="card-body">
                <form action="{{ route('employee.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="Order_Date">Data Ordine</label>
                        <input type="date" class="form-control" id="Order_Date" name="Order_Date" value="{{ $order->Order_Date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Quantity">Quantità</label>
                        <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{ $order->Quantity }}" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="ID_Product">Prodotto</label>
                        <select class="form-control" id="ID_Product" name="ID_Product" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $order->ID_Product ? 'selected' : '' }}>
                                    {{ $product->Product_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ID_Customer">Cliente</label>
                        <select class="form-control" id="ID_Customer" name="ID_Customer" required>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $customer->id == $order->ID_Customer ? 'selected' : '' }}>
                                    {{ $customer->Customer_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Aggiorna Ordine</button>
                    <a href="{{ route('employee.orders.index') }}" class="btn btn-secondary mt-3">Annulla</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .background-image {
        background-image: url('https://i.pinimg.com/736x/ce/c9/5d/cec95dff12ad93d7c9a12faf9e0905fa.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 20px;
        width: 100%;
        max-width: 800px;
        margin: auto;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    h1 {
        margin-top: 0;
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }
</style>
