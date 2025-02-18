@extends('layouts.app')

@section('content')
    <div class="background-image">
        <div class="container">
            <h1 class="mb-4 text-white">Elenco Dipendenti</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-3">Aggiungi Dipendente</a>

            <div class="table-container">
                <div class="table-header">
                    <div class="col-id">ID</div>
                    <div class="col-nome">Nome</div>
                    <div class="col-cognome">Cognome</div>
                    <div class="col-email email-column">Email</div>
                    <div class="col-spacer"></div>
                    <div class="col-telefono">Telefono</div>
                    <div class="col-dipartimento">Dipartimento</div>
                    <div class="col-azioni">Azioni</div>
                </div>
                <div class="table-body">
                    @foreach ($employees as $employee)
                        <div class="table-row">
                            <div class="col-id">{{ $employee->id }}</div>
                            <div class="col-nome">{{ $employee->First_Name }}</div>
                            <div class="col-cognome">{{ $employee->Last_Name }}</div>
                            <div class="col-email email-column">{{ $employee->Email }}</div>
                            <div class="col-spacer"></div>
                            <div class="col-telefono">{{ $employee->Phone }}</div>
                            <div class="col-dipartimento">{{ $employee->department ? $employee->department->Department_Name : 'N/A' }}</div>
                            <div class="col-azioni">
                                <a href="{{ route('admin.employees.show', $employee) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo dipendente?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pagination-container mt-3">
                {{ $employees->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

<style scoped>
    .background-image {
        background-image: url('https://media.glassdoor.com/l/1d/0c/e0/81/the-office.jpg?signature=08ee453a9f01b8338e79ea01fbec6f37e094f657ed4f6d408ef3989eef66df91');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: flex-start; /* Allinea il contenuto in alto */
        justify-content: center;
        flex-direction: column; /* Disposizione verticale */
    }

    .container {
        margin-top: 4rem;
        max-width: 100%; /* Impedisce al contenitore di superare la larghezza della vista */
        padding: 20px; /* Padding per il contenitore */
        overflow: hidden; /* Nasconde il contenuto in eccesso */
    }

    .table-container {
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.8); /* Sfondo bianco semi-trasparente */
        border-radius: 10px; /* Aggiungi angoli arrotondati */
        overflow: hidden; /* Nasconde il contenuto in eccesso */
        max-height: 70vh; /* Limita l'altezza massima della tabella */
        overflow-y: auto; /* Permette lo scroll verticale se necessario */
    }

    .table-header, .table-row {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc; /* Linea di separazione tra le righe */
    }

    .table-header {
        background-color: rgba(0, 0, 0, 0.1); /* Sfondo per l'intestazione */
        font-weight: bold;
    }

    .table-body {
        overflow-y: auto; /* Permette lo scroll verticale se necessario */
    }

    .table-row {
        display: flex; /* Mantiene le righe come flexbox */
        padding: 10px; /* Padding per le righe */
    }

    .table-header div, .table-row div {
        flex: 1; /* Ogni cella occupa lo stesso spazio */
        text-align: left; /* Allinea il testo a sinistra */
    }

    .col-id {
        flex: 0 0 50px; /* Larghezza fissa per ID */
    }

    .col-nome {
        flex: 0 0 100px; /* Larghezza fissa per Nome */
    }

    .col-cognome {
        flex: 0 0 100px; /* Larghezza fissa per Cognome */
    }

    .col-email {
        flex: 0 0 250px; /* Larghezza fissa per Email */
    }

    .col-spacer {
        flex: 0 0 20px; /* Larghezza fissa per lo spazio tra Email e Telefono */
    }

    .col-telefono {
        flex: 0 0 100px; /* Larghezza fissa per Telefono */
    }

    .col-dipartimento {
        flex: 0 0 150px; /* Larghezza fissa per Dipartimento */
    }

    .col-azioni {
        flex: 0 0 100px; /* Larghezza fissa per Azioni */
    }

    .email-column {
        min-width: 250px; /* Imposta una larghezza minima per la colonna email */
        max-width: 300px; /* Imposta una larghezza massima per la colonna email */
        overflow: hidden; /* Nasconde il contenuto in eccesso */
        text-overflow: ellipsis; /* Mostra i puntini di sospensione se il testo è troppo lungo */
        white-space: nowrap; /* Impedisce il ritorno a capo del testo */
    }

    h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

    @media (max-width: 768px) {
        .container {
    margin-top: 4rem;
    }
        .table-container {
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.8); /* Sfondo bianco semi-trasparente */
        border-radius: 10px; /* Aggiungi angoli arrotondati */
        overflow: hidden; /* Nasconde il contenuto in eccesso */
        max-height: 60vh; /* Limita l'altezza massima della tabella */
        overflow-y: auto; /* Permette lo scroll verticale se necessario */
    }
        .table-header {
            display: none; /* Nasconde l'intestazione su schermi piccoli */
        }

        .table-row {
            flex-direction: column; /* Rende le righe verticali su schermi piccoli */
            padding: 5px; /* Riduce il padding per schermi piccoli */
        }

        .table-row div {
            display: flex; /* Disposizione flessibile per ogni cella */
            justify-content: flex-start; /* Allinea il titolo e il valore a sinistra */
            margin-bottom: 5px; /* Spazio tra le righe */
        }

        .col-id {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        .col-nome {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        .col-cognome {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        .col-email {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        .col-telefono {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        .col-dipartimento {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        .col-azioni {
            flex: 1; /* Occupa tutto lo spazio disponibile */
        }

        /* Aggiungi i titoli accanto ai valori */
        .col-id::before {
            content: "ID: "; /* Aggiunge il titolo ID */
            font-weight: bold; /* Rende il titolo in grassetto */
        }

        .col-nome::before {
            content: "Nome: "; /* Aggiunge il titolo Nome */
            font-weight: bold; /* Rende il titolo in grassetto */
        }

        .col-cognome::before {
            content: "Cognome: "; /* Aggiunge il titolo Cognome */
            font-weight: bold; /* Rende il titolo in grassetto */
        }

        .col-email::before {
            content: "Email: "; /* Aggiunge il titolo Email */
            font-weight: bold; /* Rende il titolo in grassetto */
        }

        .col-telefono::before {
            content: "Telefono: "; /* Aggiunge il titolo Telefono */
            font-weight: bold; /* Rende il titolo in grassetto */
        }

        .col-dipartimento::before {
            content: "Dipartimento: "; /* Aggiunge il titolo Dipartimento */
            font-weight: bold; /* Rende il titolo in grassetto */
        }

    .btn-info{
        width: 2rem;
        height: 1.5rem;
    }
    .btn-warning{
        width: 2rem;
        height: 1.5rem;
    }
    }
</style>
