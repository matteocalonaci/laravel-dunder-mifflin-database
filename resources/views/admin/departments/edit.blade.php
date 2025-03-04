@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Modifica Dipartimento</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica che stiamo facendo un aggiornamento -->
            <div class="form-group">
                <label for="Department_Name" class="text-white">Nome Dipartimento</label>
                <input type="text" class="form-control" id="Department_Name" name="Department_Name" value="{{ old('Department_Name', $department->Department_Name) }}" required>
            </div>

            <div class="form-group">
                <label for="ID_Office" class="text-white">ID Ufficio</label>
                <input type="number" class="form-control" id="ID_Office" name="ID_Office" value="{{ old('ID_Office', $department->ID_Office) }}" required>
            </div>

            <div class="form-group">
                <label for="Number_of_Employees" class="text-white">Numero di Dipendenti</label>
                <input type="number" class="form-control" id="Number_of_Employees" name="Number_of_Employees" value="{{ old('Number_of_Employees', $department->Number_of_Employees) }}" min="0">
            </div>

            <button type="submit" class="btn btn-success w-100 mt-2">Aggiorna Dipartimento</button>
            <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary w-100 mt-2">Annulla</a>
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
