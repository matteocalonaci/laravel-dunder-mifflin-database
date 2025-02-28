@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container ">
        <h1 class="text-white text-center mb-4">Migliori Venditori del Mese - {{ now()->format('F Y') }}</h1>

        <div class="row">
            <div class="col-md-5">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Classifica Venditori</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Posizione</th>
                                    <th>Nome</th>
                                    <th>Prodotti Venduti</th>
                                    <th>Profitti (€)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Numero di posizione -->
                                    <td>{{ $data['employee']->First_Name }} {{ $data['employee']->Last_Name }}</td>
                                    <td>{{ $data['totalQuantity'] }}</td>
                                    <td>€{{ number_format($data['totalProfit'], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Grafico delle Vendite</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="topSellersChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('topSellersChart').getContext('2d');
    const labels = @json($employees->pluck('employee.First_Name'));
    const data = {
        labels: labels,
        datasets: [{
            label: 'Profitti (€)',
            data: @json($employees->pluck('totalProfit')),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const topSellersChart = new Chart(ctx, config);
</script>

<style scoped>
    body {
        margin: 0; /* Rimuovi margini di default */
        overflow: hidden; /* Nascondi le barre di scorrimento */
    }

    .background-image {
        background-image: url('https://media.timeout.com/images/105824238/750/422/image.jpg');
        background-size: cover; /* Copre l'intera area */
        background-position: center; /* Centra l'immagine */
        background-repeat: no-repeat; /* Non ripete l'immagine */
        min-height: 100vh; /* Assicura che l'immagine copra l'intera altezza della finestra */
        display: flex; /* Usa flexbox per centrare il contenuto */
        align-items: flex-start; /* Allinea il contenuto in alto */
        justify-content: center; /* Centra orizzontalmente */
    }

    .container {
        margin-top: 7rem;
        background-color: rgba(255, 255, 255, 0.9); /* Sfondo bianco semi-trasparente per migliorare la leggibilità */
        border-radius: 10px; /* Angoli arrotondati */
        padding: 20px; /* Padding interno */
        width: 100%; /* Assicura che il contenitore occupi il 100% della larghezza disponibile */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombra per il contenitore */
    }

    h1 {
        margin-top: 0; /* Rimuovi il margine superiore */
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
            1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px -1px 0 rgb(0, 0, 0);
    }

    .card-header {
        font-weight: bold;
    }

    .table th, .table td {
        vertical-align: middle; /* Allinea verticalmente il contenuto */
    }

    .table th {
        background-color: rgba(0, 123, 255, 0.1); /* Colore di sfondo per le intestazioni della tabella */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 123, 255, 0.05); /* Colore di sfondo per le righe dispari */
    }

    .table-striped tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.15); /* Colore di sfondo al passaggio del mouse */
    }

    .card {
        border: none; /* Rimuovi il bordo della card */
    }

    .card-body {
        padding: 1.5rem; /* Padding interno per il corpo della card */
    }

    @media (max-width: 768px) {
        h1 {
            margin-top: 8rem; /* Aumenta il margine superiore su schermi più piccoli */
        }

        .table thead {
            display: none; /* Nascondi le intestazioni della tabella su schermi piccoli */
        }

        .table tr {
            display: block; /* Rendi le righe della tabella a blocchi */
            margin-bottom: 15px; /* Margine tra le righe */
        }

        .table td {
            display: block; /* Rendi le celle della tabella a blocchi */
            padding: 10px; /* Padding per le celle */
            border: none; /* Rimuovi il bordo delle celle */
            position: relative; /* Posizione relativa per le etichette */
        }

        .table td::before {
            content: attr(data-label); /* Mostra l'etichetta della cella */
            font-weight: bold; /* Grassetto per le etichette */
            margin-bottom: 5px; /* Margine sotto le etichette */
            display: block; /* Mostra le etichette come blocchi */
        }
    }
</style>
@endsection
