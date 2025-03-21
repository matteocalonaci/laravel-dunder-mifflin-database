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
        {{-- <a href="{{ route('employee.orders.create') }}" class="btn btn-primary mb-3">Crea Nuovo Ordine</a> --}}

        <div class="table-container">
            <div class="table-header">
                <div class="col-id">ID Ordine</div>
                <div class="col-data">Data</div>
                <div class="col-quantita">Quantità</div>
                <div class="col-prodotto">Prodotto</div>
                <div class="col-cliente">Cliente</div> <!-- Colonna per il cliente -->
                <div class="col-venditore">Venditore</div> <!-- Nuova colonna per il venditore -->
                {{-- <div class="col-azioni">Azioni</div> --}}
            </div>
            <div class="table-body">
                @forelse($orders as $order)
                    <div class="table-row">
                        <div class="col-id">{{ $order->id }}</div>
                        <div class="col-data">{{ \Carbon\Carbon::parse($order->Order_Date)->format('d/m/Y') }}</div>
                        <div class="col-quantita">{{ $order->Quantity }}</div>
                        <div class="col-prodotto">{{ $order->product->Product_Name ?? 'N/A' }}</div>
                        <div class="col-cliente">{{ $order->customer->Customer_Name ?? 'N/A' }}</div> <!-- Mostra il nome del cliente -->
                        <div class="col-venditore">{{ $order->employee->First_Name . ' ' . $order->employee->Last_Name ?? 'N/A' }}</div> <!-- Mostra il nome del venditore -->
                        {{-- <div class="col-azioni">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div> --}}
                    </div>
                @empty
                    <div class="table-row">
                        <div class="col-id" colspan="7" class="text-center">Nessun ordine trovato.</div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="pagination-container mt-3">
            <div class="pagination-wrapper">
                {{ $orders->links('pagination::bootstrap-4') }}
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
            flex: 0 0 80px;
        }

        .col-data {
            flex: 0 0 50px;
        }

        .col-quantita {
            flex: 0 0 70px;
        }

        .col-prodotto {
            flex: 0 0 200px;
        }

        .col-cliente {
            flex: 0 0 200px;
        }

        .col-venditore {
            flex: 0 0 200px; /* Imposta la larghezza della colonna venditore */
        }

        .col-azioni {
            flex: 0 0 70px;
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
                width: 100%;
            }

            .col-id::before {
                content: "ID: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .col-data::before {
                content: "Data: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .col-quantita::before {
                content: "Quantità: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .col-prodotto::before {
                content: "Prodotto: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .col-cliente::before {
                content: "Cliente: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .col-venditore::before {
                content: "Venditore: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .col-azioni::before {
                content: "Azioni: ";
                font-weight: bold;
                margin-right: 0.5rem;
            }

            .btn-warning {
                width: 1.8rem;
                height: 1.5rem;
                font-size: 0.8rem;
            }

            .btn-primary {
                width: 100%; /* Pulsante a larghezza piena su schermi piccoli */
            }

            .pagination-wrapper {
                margin-left: 11rem;
            }

            .col-id {
                flex: 1;
            }

            .col-data {
                flex: 1;
            }

            .col-quantita {
                flex: 1;
            }

            .col-prodotto {
                flex: 1;
            }

            .col-cliente {
                flex: 1;
            }

            .col-venditore {
                flex: 1;
            }

            .col-azioni {
                flex: 1;
            }
        }
    </style>
</div>
