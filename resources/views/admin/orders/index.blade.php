@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">I tuoi ordini</h1>

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

        <!-- Pulsante per creare un nuovo ordine -->
        <a href="{{ route('employee.orders.create') }}" class="btn btn-primary mb-3 w-100">Crea Nuovo Ordine</a>

        <div class="table-container">
            <div class="table-header">
                <div class="col-id">ID Ordine</div>
                <div class="col-data">Data</div>
                <div class="col-quantita">Quantità</div>
                <div class="col-prodotto">Prodotto</div>
                <div class="col-azioni">Azioni</div>
            </div>
            <div class="table-body">
                @forelse($orders as $order)
                    <div class="table-row">
                        <div class="col-id">{{ $order->id }}</div>
                        <div class="col-data">{{ \Carbon\Carbon::parse($order->Order_Date)->format('d/m/Y') }}</div>
                        <div class="col-quantita">{{ $order->Quantity }}</div>
                        <div class="col-prodotto">{{ $order->product->Product_Name ?? 'N/A' }}</div>
                        <div class="col-azioni">
                            <a href="{{ route('employee.orders.edit', $order->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifica
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="table-row">
                        <div class="col-id" colspan="5" class="text-center">Nessun ordine trovato.</div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="pagination-container mt-3">
            <div class="pagination-wrapper">
                {{ $orders->links('pagination::bootstrap-4') }} <!-- Paginazione -->
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
        flex-wrap: wrap; /* Permette di avvolgere le righe su schermi piccoli */
    }

    .table-header div, .table-row div {
        text-align: left;
        flex: 1; /* Permette di distribuire lo spazio in modo uniforme */
    }

    .col-id {
        flex: 0 0 80px;
    }

    .col-data {
        flex: 0 0        100px;
    }

    .col-quantita {
        flex: 0 0 70px;
    }

    .col-prodotto {
        flex: 0 0 230px;
    }

    .col-azioni {
        flex: 0 0 110px;
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
            display: none; /* Nascondi l'intestazione della tabella su schermi piccoli */
        }

        .table-row {
            flex-direction: column; /* Cambia la direzione delle righe per i dispositivi mobili */
            padding: 10px;
            border-bottom: 1px solid #ccc; /* Aggiungi un bordo inferiore per separare le righe */
        }

        .table-row div {
            display: flex;
            justify-content: space-between; /* Allinea i contenuti a sinistra e a destra */
            margin-bottom: 5px; /* Spazio tra le righe */
            width: 100%; /* Assicura che le righe occupino tutta la larghezza */
        }

        .col-id::before {
            content: "ID: ";
            font-weight: bold;
        }

        .col-data::before {
            content: "Data: ";
            font-weight: bold;
        }

        .col-quantita::before {
            content: "Quantità: ";
            font-weight: bold;
        }

        .col-prodotto::before {
            content: "Prodotto: ";
            font-weight: bold;
        }

        .col-azioni::before {
            content: "Azioni: ";
            font-weight: bold;
        }

        .btn-warning {
            width: 100%; /* Pulsante di modifica a larghezza piena */
            margin-top: 5px; /* Spazio sopra il pulsante */
        }

        .btn-info {
            width: 100%; /* Pulsante di visualizzazione a larghezza piena */
            margin-top: 5px; /* Spazio sopra il pulsante */
        }

        .margin-dx {
            margin-right: 0; /* Rimuovi margine destro per i pulsanti su mobile */
        }
    }
</style>
