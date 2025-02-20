@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container custom-margin">
        <h2 class="text-white">Modifica Dettagli Dipendente</h2>

        <div class="card">
            <div class="card-header">
                Modifica informazioni per {{ $employee->First_Name }} {{ $employee->Last_Name }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email', $employee->Email) }}" required>
                        @error('Email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Phone">Numero di Telefono</label>
                        <input type="text" name="Phone" id="Phone" class="form-control" value="{{ old('Phone', $employee->Phone) }}" required>
                        @error('Phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ID_Department">Dipartimento</label>
                        <select name="ID_Department" id="ID_Department" class="form-control" required>
                            <option value="">Seleziona un dipartimento</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $department->id == $employee->ID_Department ? 'selected' : '' }}>
                                    {{ $department->Department_Name }}
                                </option>
                            @endforeach
                        </select>
                        @error('ID_Department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Annulla</a>
                        <button type="submit" class="btn btn-primary">Aggiorna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .background-image {
        background-image: url('https://assets.architecturaldigest.in/photos/600842e0cce5700439e12665/master/w_1600%2Cc_limit/The-Office-Dunder-Mifflin-9.jpg');
        background-size: cover; /* Assicura che l'immagine copra l'intero sfondo */
        background-position: center; /* Centra l'immagine */
        height: 100vh; /* Altezza dell'immagine di sfondo */
        display: flex;
        align-items: flex-start; /* Allinea gli elementi all'inizio */
        justify-content: center; /* Centra il contenuto orizzontalmente */
    }

    .container {
        flex: 1; /* Permette al contenitore di crescere e riempire lo spazio disponibile */
        display: flex;
        flex-direction: column; /* Impila i figli verticalmente */
        justify-content: flex-start; /* Allinea i figli in alto */
        padding: 20px; /* Aggiungi un padding per il contenuto */
        height: 100%; /* Assicura che il contenitore occupi l'intera altezza */
        overflow-y: auto; /* Permette lo scorrimento verticale */
        scrollbar-width: none; /* Nasconde la scrollbar in Firefox */
        padding-top: 5rem;
    }

    .container::-webkit-scrollbar {
        display: none; /* Nasconde la scrollbar in Chrome, Safari e Edge */
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9); /* Sfondo bianco con 90% di opacità */
        border: none; /* Rimuovi il bordo */
        border-radius: 10px; /* Angoli arrotondati */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombra per profondità */
        margin-bottom: 20px; /* Margine inferiore per separare le card */
    }

    h2 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }
</style>
