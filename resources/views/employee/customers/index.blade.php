@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Elenco Clienti</h1>

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

<a href="{{ route('employee.customers.create') }}" class="btn btn-primary width-mobile mb-3">Crea Nuovo Cliente</a>
        <div class="table-container">
            <div class="table-header">
                <div class="col-id">ID</div>
                <div class="col-nome">Nome Cliente</div>
                <div class="col-contatto">Numero di Contatto</div>
                <div class="col-indirizzo">Indirizzo</div>
                <div class="col-azioni">Azioni</div>
            </div>
            <div class="table-body">
                @foreach($customers as $customer)
                    <div class="table-row">
                        <div class="col-id">{{ $customer->id }}</div>
                        <div class="col-nome">{{ $customer->Customer_Name }}</div>
                        <div class="col-contatto">{{ $customer->Contact_Number }}</div>
                        <div class="col-indirizzo">{{ $customer->Address }}</div>
                        <div class="col-azioni">
                            <a href="{{ route('employee.customers.edit', $customer->id) }}" class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('employee.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
                {{ $customers->links('pagination::bootstrap-4') }} <!-- Paginazione -->
            </div>
        </div>
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
        padding: 5px;
    }

    .table-header div, .table-row div {
        text-align: left;
        margin-right: 10px;
    }

    .table-header div:last-child, .table-row div:last-child {
        margin-right: 0;
    }

    .col-id {
        flex: 0 0 50px;
    }

    .col-nome {
        flex: 100px;
    }

    .col-contatto {
        flex: 80px;
    }

    .col-indirizzo {
        flex: 350px;
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
            justify-content: flex-start; /* Allinea i contenuti a sinistra */
            margin-bottom: 5px; /* Spazio tra le righe */
            width: 100%; /* Assicura che le righe occupino tutta la larghezza */
        }

        .col-id::before {
            content: "ID: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-nome::before {
            content: "Nome Cliente: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-contatto::before {
            content: "Numero di Contatto: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-indirizzo::before {
            content: "Indirizzo: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .col-azioni::before {
            content: "Azioni: ";
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .btn-warning, .btn-danger {
            width: 100%;
            margin-top: 5px;
        }

        .btn-info {
            width: 2rem;
            height: 1.5rem;
        }

        .btn-warning {
            width: 2rem;
            height: 1.5rem;
        }

        .width-mobile {
            width: 100%;
        }

    .col-id {
        flex: 1;
    }

    .col-nome {
        flex: 1;
    }

    .col-contatto {
        flex: 1;
    }

    .col-indirizzo {
        flex: 1;
    }

    .col-azioni {
        flex: 1;
    }

    }
</style>
