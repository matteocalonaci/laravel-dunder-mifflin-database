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
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
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
                        <label for="ID_User">Dipendente</label>
                        <select class="form-control" id="ID_User" name="ID_User" required>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->ID_User }}" {{ $employee->ID_User == $order->ID_User ? 'selected' : '' }}>
                                    {{ $employee->First_Name }} {{ $employee->Last_Name }}
                                </option>
                            @endforeach
                        </select>
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

                    <button type="submit" class="btn btn-success">Aggiorna Ordine</button>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Annulla</a>
                </form>
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
