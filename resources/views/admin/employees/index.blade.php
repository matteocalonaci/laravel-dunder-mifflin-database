@extends('layouts.app')

@section('content')
    <div class="background-image">
        <div class="container">
            <h1 class="mb-4 text-white text-center">Elenco Dipendenti</h1>

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

            <a href="{{ route('admin.employees.create') }}" class="btn btn-primary width-mobile mb-3">Aggiungi Dipendente</a>

            <div class="table-container">
                <div class="table-header">
                    <div class="col-id">ID</div>
                    <div class="col-nome">Nome</div>
                    <div class="col-cognome">Cognome</div>
                    <div class="col-email email-column">Email</div>
                    <div class="col-spacer"></div>
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
                            <div class="col-dipartimento">{{ $employee->department ? $employee->department->Department_Name : 'N/A' }}</div>
                            <div class="col-azioni">
                                <a href="{{ route('admin.employees.show', $employee) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
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
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        overflow: hidden; /* Nascondere la barra di scorrimento nella sezione principale */
    }

    .container {
        margin-top: 3rem;
        max-width: 100%;
        padding: 20px;
        height: 100vh; /* Impostare altezza al 100% per la parte contenente il contenuto */
        overflow-y: auto; /* Permette lo scroll del contenuto */
    }

    .table-container {
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        overflow: hidden;
        max-height: 70vh;
    }

    .table-header, .table-row {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .table-header {
        background-color: rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }

    .table-body {
        overflow-y: auto;
    }

    .table-row {
        display: flex;
        padding: 10px;
    }

    .table-header div, .table-row div {
        flex: 1;
        text-align: left;
    }

    .col-id {
        flex: 0 0 50px;
    }

    .col-nome {
        flex: 0 0 100px;
    }

    .col-cognome {
        flex: 0 0 100px;
    }

    .col-email {
        flex: 0 0 200px;
    }

    .col-spacer {
        flex: 0 0 20px;
    }

    .col-dipartimento {
        flex: 0 0 150px;
    }

    .col-azioni {
        flex: 0 0 100px;
    }

    .email-column {
        min-width: 250px;
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

    /* Stile per scrollbar trasparente */
    .container::-webkit-scrollbar {
        width: 10px; /* Imposta la larghezza della scrollbar */
    }

    .container::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2); /* Barra di scorrimento trasparente */
        border-radius: 10px; /* Arrotonda gli angoli della scrollbar */
    }

    .container::-webkit-scrollbar-track {
        background-color: transparent; /* Rende il tracciato trasparente */
    }

    @media (max-width: 768px) {
        .container {
            margin-top: 4rem;
        }
        .table-container {
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            max-height: 60vh;
            overflow-y: auto;
        }
        .table-header {
            display: none;
        }

        .table-row {
            flex-direction: column;
            padding: 5px;
        }

        .table-row div {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 5px;
        }

        .col-id {
            flex: 1;
        }

        .col-nome {
            flex: 1;
        }

        .col-cognome {
            flex: 1;
        }
        .col-email {
            flex: 1;
        }

        .col-dipartimento {
            flex: 1;
        }

        .col-azioni {
            flex: 1;
        }

        .col-id::before {
            content: "ID: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-nome::before {
            content: "Nome: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-cognome::before {
            content: "Cognome: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-email::before {
            content: "Email: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-dipartimento::before {
            content: "Dipartimento: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-azioni::before {
            content: "Azioni: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .btn-info {
            width: 2rem;
            height: 1.5rem;
            margin-right: 0.5rem;
        }
        .btn-warning {
            width: 2rem;
            height: 1.5rem;
            margin-right: 0.5rem;
        }

        .width-mobile{
            width: 100%;
        }
    }
</style>
