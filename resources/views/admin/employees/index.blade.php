@extends('layouts.app')

@section('content')
    <div class="background-image">
        <div class="container mt-4">
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

            <div class="table-responsive">
                <div class="table-container">
                    <div class="table-header">
                        <div class="col-id">ID</div>
                        <div class="col-nome">Nome</div>
                        <div class="col-cognome">Cognome</div>
                        <div class="col-email email-column">Email</div>
                        <div class="col-spacer"></div> <!-- Spacer column -->
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
                                <div class="col-spacer"></div> <!-- Spacer column -->
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
            </div>

            <div class="mt-4">
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
        align-items: center;
        justify-content: center;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        overflow: hidden;
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
        flex: 0 0 250px;
    }

    .col-spacer {
        flex: 0 0 20px;
    }

    .col-telefono {
        flex: 0 0 100px;
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

    @media (max-width: 768px) {
        .table-row {
            flex-direction: column; /* Rende le righe verticali su schermi piccoli */
        }

        .table-row div {
            min-width: 100%; /* Ogni cella occupa il 100% della larghezza */
        }

        .email-column {
            min-width: 100%; /* La colonna email occupa il 100% della larghezza su schermi piccoli */
        }
    }
</style>
