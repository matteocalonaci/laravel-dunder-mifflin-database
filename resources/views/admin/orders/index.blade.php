@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="mb-4 text-white">Elenco Ordini</h1>

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

        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary mb-3">Crea Nuovo Ordine</a>

        <div class="table-container">
            <div class="table-header">
                <div class="col-id">ID Ordine</div>
                <div class="col-data">Data Ordine</div>
                <div class="col-dipendente">Dipendente</div>
                <div class="col-cliente">Cliente</div>
                <div class="col-prodotto">Prodotto</div>
                <div class="col-quantita">Quantità</div>
                <div class="col-azioni">Azioni</div>
            </div>
            <div class="table-body">
                @foreach($orders as $order)
                    <div class="table-row">
                        <div class="col-id">{{ $order->id }}</div>
                        <div class="col-data">{{ \Carbon\Carbon::parse($order->Order_Date)->format('d/m/Y') }}</div>
                        <div class="col-dipendente">{{ $order->employee->First_Name }} {{ $order->employee->Last_Name }}</div>
                        <div class="col-cliente">{{ $order->customer->Customer_Name }}</div>
                        <div class="col-prodotto">{{ $order->product->Product_Name }}</div>
                        <div class="col-quantita">{{ $order->Quantity }}</div>
                        <div class="col-azioni">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm mx-2">
                                 <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm mx-2">
                                 <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-2">
                                     <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pagination-container mt-3">
            <div class="pagination-wrapper">
                {{ $orders->links('pagination::bootstrap-4') }} <!-- Mostra i link di paginazione -->
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
    .background-image {
        background-image: url('https://i.pinimg.com/736x/ce/c9/5d/cec95dff12ad93d7c9a12faf9e0905fa.jpg');
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
        height: 100%; /* Assicura che il contenitore occupi l'intera altezza */
        overflow-y: auto; /* Permette lo scorrimento verticale */
        scrollbar-width: none; /* Nasconde la scrollbar in Firefox */
    }

    .container::-webkit-scrollbar {
        display: none; /* Nasconde la scrollbar in Chrome, Safari e Edge */
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
        flex: 0 0 80px; /* Larghezza fissa per ID */
    }

    .col-data {
        flex: 0 0 100px; /* Larghezza fissa per Data */
    }

    .col-dipendente {
        flex: 0 0 140; /* Maggiore larghezza per Dipendente */
    }

    .col-cliente {
        flex: 0 0 200px; /* Maggiore larghezza per Cliente */
    }

    .col-prodotto {
        flex: 0 0 230px; /* Maggiore larghezza per Prodotto */
    }

    .col-quantita {
        flex: 0 0 70px; /* Larghezza fissa per Quantità */
    }

    .col-azioni {
        flex: 0 0 110px; /* Larghezza fissa per Azioni */
    }

    h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

    .pagination-container {
        overflow-x: auto; /* Permette lo scorrimento orizzontale */
    }

    .pagination-wrapper {
        display: flex; /* Usa flexbox per allineare i link di paginazione */
        justify-content: center; /* Centra i link di paginazione */
        padding: 10px 0; /* Padding per i link di paginazione */
    }

    @media (max-width: 768px) {
        .page-link{
            margin-left: 7.5rem;
        }
        .container {
            margin-top: 4rem;
        }

        .table-container {
            max-height: 60vh;
        }

        .table-header {
            display: none; /* Nasconde l'intestazione della tabella */
        }

        .table-row {
            flex-direction: column; /* Cambia la direzione delle righe in colonna */
            padding: 5px;
        }

        .table-row div {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 5px;
            width: 100%; /* Assicura che le celle occupino l'intera larghezza */
        }

        .col-id::before {
            content: "ID: ";
            font-weight: bold;
        }

        .col-data::before {
            content: "Data Ordine: ";
            font-weight: bold;
        }

        .col-dipendente::before {
            content: "Dipendente: ";
            font-weight: bold;
        }

        .col-cliente::before {
            content: "Cliente: ";
            font-weight: bold;
        }

        .col-prodotto::before {
            content: "Prodotto: ";
            font-weight: bold;
        }

        .col-quantita::before {
            content: "Quantità: ";
            font-weight: bold;
        }

        .col-azioni::before {
            content: "Azioni: ";
            font-weight: bold;
        }
        .col-id {
        flex: 0 0 30px; /* Larghezza fissa per ID */
    }

    .col-data {
        flex: 0 0 30px; /* Larghezza fissa per Data */
    }

    .col-dipendente {
        flex: 0 0 30; /* Maggiore larghezza per Dipendente */
    }

    .col-cliente {
        flex: 0 0 30px; /* Maggiore larghezza per Cliente */
    }

    .col-prodotto {
        flex: 0 0 30px; /* Maggiore larghezza per Prodotto */
    }

    .col-quantita {
        flex: 0 0 30px; /* Larghezza fissa per Quantità */
    }

    .col-azioni {
        flex: 0 0 30px; /* Larghezza fissa per Azioni */
    }

        .btn-info {
            width: 2rem;
            height: 1.5rem;
        }

        .btn-warning {
            width: 2rem;
            height: 1.5rem;
        }
    }
</style>
