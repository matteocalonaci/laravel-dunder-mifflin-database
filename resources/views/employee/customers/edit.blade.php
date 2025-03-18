@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Modifica Cliente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employee.customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica che stiamo facendo un aggiornamento -->
            <div class="form-group">
                <label for="Customer_Name" class="text-white">Nome Cliente</label>
                <input type="text" class="form-control" id="Customer_Name" name="Customer_Name" value="{{ old('Customer_Name', $customer->Customer_Name) }}" required>
            </div>

            <div class="form-group">
                <label for="Contact_Number" class="text-white">Numero di Contatto</label>
                <input type="text" class="form-control" id="Contact_Number" name="Contact_Number" value="{{ old('Contact_Number', $customer->Contact_Number) }}" required>
            </div>

            <div class="form-group">
                <label for="Address" class="text-white">Indirizzo</label>
                <input type="text" class="form-control" id="Address" name="Address" value="{{ old('Address', $customer->Address) }}">
            </div>

            <button type="submit" class="btn btn-success w-100 mt-2">Aggiorna Cliente</button>
            <a href="{{ route('employee.customers.index') }}" class="btn btn-secondary w-100 mt-2">Annulla</a>
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
