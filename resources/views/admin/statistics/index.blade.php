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
        margin: 0;
        overflow: hidden;
    }

    .background-image {
        background-image: url('https://media.timeout.com/images/105824238/750/422/image.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }

    .container {
        margin-top: 7rem;
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
            margin-top: 8rem;
        }

        .table thead {
            display: none;
        }

        .table tr {
            display: block;
            margin-bottom: 15px;
        }

        .table td {
            display: block;
            padding: 10px;
            border: none;
            position: relative;
        }

        .table td::before {
            content: attr(data-label);
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
    }
</style>
@endsection
