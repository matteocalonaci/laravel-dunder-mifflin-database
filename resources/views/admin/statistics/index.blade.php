@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="text-white text-center mb-4">Migliori Venditori del Mese - {{ now()->format('F Y') }}</h1>

        <div class="row">
            <!-- Classifica Venditori per Desktop -->
            <div class="col-md-5 d-none d-md-block">
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
                                    <td>{{ $index + 1 }}</td>
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

            <!-- Grafico per Desktop -->
            <div class="col-md-7 d-none d-md-block">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Grafico delle Vendite</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="topSellersChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafico sopra la classifica per Mobile -->
            <div class="col-md-12 d-md-none">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Grafico delle Vendite</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="topSellersChartMobile" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Classifica per Mobile -->
            <div class="col-md-12 d-md-none">
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
                                    <td>{{ $index + 1 }}</td>
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
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Grafico per desktop
    const ctxDesktop = document.getElementById('topSellersChart').getContext('2d');
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

    const topSellersChart = new Chart(ctxDesktop, config);

    // Grafico per mobile
    const ctxMobile = document.getElementById('topSellersChartMobile').getContext('2d');
    const topSellersChartMobile = new Chart(ctxMobile, config);
</script>

<style scoped>
    body {
        margin: 0;
        overflow: hidden;
    }

    .background-image {
        background-image: url('https://media.glassdoor.com/l/1d/0c/e0/81/the-office.jpg?signature=08ee453a9f01b8338e79ea01fbec6f37e094f657ed4f6d408ef3989eef66df91');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }

    .container {
        margin-top: 5.3rem;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 20px;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h1 {
        margin-top: 0;
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
        vertical-align: middle;
    }

    .table th {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .table-striped tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.15);
    }

    .card {
        border: none;
    }

    .card-body {
        padding: 1.5rem;
    }
    @media (max-width: 768px) {
        h1 {
            margin-top: 1rem; /* Ridotto per meno spazio sopra il titolo */
        }

        .table {
            font-size: 14px; /* Dimensione del testo per la tabella */
        }

        .table th, .table td {
            padding: 8px; /* Riduci il padding delle celle */
        }

        .container {
            padding: 15px; /* Riduci il padding per i dispositivi mobili */
            width: 95%; /* Maggiore larghezza per i dispositivi mobili */
            margin-bottom: 15px; /* Aggiunto margine inferiore */
        }
    }
</style>
@endsection
