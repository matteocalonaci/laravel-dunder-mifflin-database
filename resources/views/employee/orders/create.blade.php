@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white">Crea Nuovo Ordine</h1>

        <div class="card">
            <div class="card-header">
                Dettagli Ordine
            </div>
            <div class="card-body">
                <form action="{{ route('employee.orders.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="Order_Date">Data Ordine</label>
                        <input type="date" class="form-control" id="Order_Date" name="Order_Date" required>
                    </div>

                    <div class="form-group">
                        <label for="Quantity">Quantità</label>
                        <input type="number" class="form-control" id="Quantity" name="Quantity" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="ID_Product">Prodotto</label>
                        <select class="form-control" id="ID_Product" name="ID_Product" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->Product_Name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ID_Customer">Cliente</label>
                        <select class="form-control" id="ID_Customer" name="ID_Customer" required>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->Customer_Name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Crea Ordine</button>
                    <a href="{{ route('employee.orders.index') }}" class="btn btn-secondary">Annulla</a>
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
