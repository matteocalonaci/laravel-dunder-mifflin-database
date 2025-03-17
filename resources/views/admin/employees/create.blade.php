@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container custom-margin">
        <h2 class="mb-4 text-white">Creazione Nuovo Dipendente</h2>

        <div class="card">
            <div class="card-header">
                Inserisci i dettagli del nuovo dipendente
            </div>
            <div class="card-body">
                <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="First_Name">Nome</label>
                        <input type="text" name="First_Name" id="First_Name" class="form-control" placeholder="Inserisci il nome" required>
                        @error('First_Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Last_Name">Cognome</label>
                        <input type="text" name="Last_Name" id="Last_Name" class="form-control" placeholder="Inserisci il cognome" required>
                        @error('Last_Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ID_Department">Dipartimento</label>
                        <select name="ID_Department" id="ID_Department" class="form-control" required>
                            <option value="">Seleziona un dipartimento</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->Department_Name }}</option>
                            @endforeach
                        </select>
                        @error('ID_Department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Phone">Numero di Telefono</label>
                        <input type="text" name="Phone" id="Phone" class="form-control" placeholder="Inserisci il numero di telefono" required>
                        @error('Phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="Email" id="Email" class="form-control" placeholder="Inserisci l'email" required>
                        @error('Email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Immagine</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hired_at">Data di Assunzione</label>
                        <input type="date" name="hired_at" id="hired_at" class="form-control" required>
                        @error('hired_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Annulla</a>
                        <button type="submit" class="btn btn-primary">Crea Dipendente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
.custom-margin {
    margin-top: 0; /* Rimuovi margine superiore per evitare spazi bianchi */
}

.background-image {
    background-image: url('https://i.etsystatic.com/15952151/r/il/1f3dfd/3423772641/il_fullxfull.3423772641_663t.jpg');
    background-size: cover; /* Assicura che l'immagine copra l'intero sfondo */
    background-position: center; /* Centra l'immagine */
    height: 100vh; /* Imposta l'altezza del contenitore a 100vh */
    display: flex;
    align-items: flex-start; /* Allinea gli elementi all'inizio */
}

.container {
    display: flex;
    flex-direction: column; /* Impila i figli verticalmente */
    justify-content: flex-start; /* Allinea i figli in alto */
    height: 100%; /* Assicura che il contenitore occupi l'intera altezza */
    overflow-y: scroll; /* Permette lo scorrimento verticale */
    scrollbar-width: none; /* Nasconde la scrollbar in Firefox */
    padding-top: 5rem; /* Aggiungi padding per evitare sovrapposizioni con l'header */
}

.container::-webkit-scrollbar {
    display: none; /* Nasconde la scrollbar in Chrome, Safari e Edge */
}

.card {
    background-color: rgba(255, 255, 255, 0.9); /* Sfondo bianco con 90% di opacità */
    border: none; /* Rimuovi il bordo */
    border-radius: 10px; /* Angoli arrotondati */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombra per profondità */
}

.form-control {
    background-color: rgba(255, 255, 255, 0.8); /* Input fields with 80% opacity */
    border: 1px solid rgba(0, 0, 0, 0.1); /* Light border for input fields */
}

h2 {
    text-shadow:
        -1px -1px 0 rgb(0, 0, 0),
         1px -1px 0 rgb(0, 0, 0),
        -1px  1px 0 rgb(0, 0, 0),
        1px  1px 0 rgb(0, 0, 0);
}

@media (max-width: 768px) {
    .custom-margin {
        margin-top: 0; /* Rimuovi margine superiore per evitare spazi bianchi */
    }

    .card{
        margin-bottom: 1rem;
    }
}
</style>
