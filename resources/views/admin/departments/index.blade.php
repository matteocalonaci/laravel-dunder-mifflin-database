@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Elenco Dipartimenti</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary width-mobile mb-3">Crea Nuovo Dipartimento</a>

        <div class="table-container">
            <div class="table-header">
                <div class="col-id">ID</div>
                <div class="col-nome">Nome Dipartimento</div>
                <div class="col-ufficio">ID Ufficio</div>
                <div class="col-dipendenti">Numero di Dipendenti</div>
                <div class="col-azioni">Azioni</div>
            </div>
            <div class="table-body">
                @foreach($departments as $department)
                    <div class="table-row">
                        <div class="col-id">{{ $department->id }}</div>
                        <div class="col-nome">{{ $department->Department_Name }}</div>
                        <div class="col-ufficio">{{ $department->ID_Office }}</div>
                        <div class="col-dipendenti">{{ $department->Number_of_Employees }}</div>
                        <div class="col-azioni">
                            <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pagination-container mt-3">
            <div class="pagination-wrapper">
                {{ $departments->links('pagination::bootstrap-4') }} <!-- Paginazione -->
            </div>
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
    }

    .container {
        margin-top: 3rem;
        max-width: 100%;
        padding: 20px;
        height: 100%;
        overflow-y: auto;
        scrollbar-width: none;
    }

    .container::-webkit-scrollbar {
        display: none;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        overflow: hidden;
        max-height: 70vh;
        overflow-y: auto;
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
        text-align: left;
    }

    .col-id {
        flex: 0 0 50px;
    }

    .col-nome {
        flex: 1;
    }

    .col-ufficio {
        flex: 1;
    }

    .col-dipendenti {
        flex: 1;
    }

    .col-azioni {
        flex: 0 0 100px;
    }

    h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

    .pagination-container {
        overflow-x: auto;
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        padding: 10px 0;
    }

    @media (max-width: 768px) {
        .table-header {
            display: none;
        }

        .table-row {
            flex-direction: column;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .table-row div {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 5px;
            width: 100%;
        }

        .col-id::before {
            content: "ID: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-nome::before {
            content: "Nome Dipartimento: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-ufficio::before {
            content: "ID Ufficio: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-dipendenti::before {
            content: "Numero di Dipendenti: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-azioni::before {
            content: "Azioni: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .btn-warning {
            width: 2rem;
            height: 1.5rem;
        }

        /* Aggiungi margini tra le colonne */
        .table-header div:not(:last-child),
        .table-row div:not(:last-child) {
            margin-right: 15px;
        }

    .width-mobile{
        width: 100%;
    }

    .col-id {
        flex: 1;
    }

    .col-nome {
        flex: 1;
    }

    .col-ufficio {
        flex: 1;
    }

    .col-dipendenti {
        flex: 1;
    }

    .col-azioni {
        flex: 1;
    }

    }
</style>
