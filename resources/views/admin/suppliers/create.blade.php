@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Crea Nuovo Fornitore</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.suppliers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Supplier_Name" class="text-white">Nome Fornitore</label>
                <input type="text" class="form-control" id="Supplier_Name" name="Supplier_Name" value="{{ old('Supplier_Name') }}" required>
            </div>

            <div class="form-group">
                <label for="Contact_Info" class="text-white">Numero di Contatto</label>
                <input type="text" class="form-control" id="Contact_Info" name="Contact_Info" value="{{ old('Contact_Info') }}" required>
            </div>

            <div class="form-group">
                <label for="Products_Offered" class="text-white">Prodotti Offerti</label>
                <input type="text" class="form-control" id="Products_Offered" name="Products_Offered" value="{{ old('Products_Offered') }}">
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Crea Fornitore</button>
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
