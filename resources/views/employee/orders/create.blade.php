@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea Nuovo Ordine</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('employee.orders.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="ID_Customer">Cliente</label>
        <select name="ID_Customer" id="ID_Customer" class="form-control" required>
            <option value="">Seleziona un cliente</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->Customer_Name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="ID_Product">Prodotto</label>
        <select name="ID_Product" id="ID_Product" class="form-control" required>
            <option value="">Seleziona un prodotto</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->Product_Name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Quantity">Quantità</label>
        <input type="number" name="Quantity" id="Quantity" class="form-control" required min="1">
    </div>

    <div class="form-group">
        <label for="Order_Date">Data Ordine</label>
        <input type="date" name="Order_Date" id="Order_Date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Crea Ordine</button>
</form>
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
