@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Modifica Fornitore</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica che stiamo facendo un aggiornamento -->
            <div class="form-group">
                <label for="name" class="text-white">Nome Fornitore</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->Supplier_Name) }}" required>
            </div>

            <div class="form-group">
                <label for="contact_number" class="text-white">Numero di Contatto</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $supplier->Contact_Info) }}" required>
            </div>

            <div class="form-group">
                <label for="address" class="text-white">Prodotto</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $supplier->Products_Offered) }}">
            </div>

            <button type="submit" class="btn btn-success w-100 mt-2">Aggiorna Fornitore</button>
            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary w-100 mt-2">Annulla</a>
        </form>
    </div>
</div>
@endsection

<style scoped>
    .background-image {
        background-image: url('https://media.timeout.com/images/105824238/750/422/image.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
    }

    .container {
        margin-top: 3rem;
        max-width: 100%;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
    }

    h1, label {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }
</style>
