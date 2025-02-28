@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-white text-center mb-4">Migliori Venditori del Mese</h1>

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
                                <th>Profitti (€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Numero di posizione -->
                                <td>{{ $data['employee']->First_Name }} {{ $data['employee']->Last_Name }}</td>
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
                    <h5 class="mb-0">Grafico delle Vendite - {{ now()->format('F Y') }}</h5>
                </div>
                <div class="card-body">
                    <canvas id="topSellersChart" width="400" height="200"></canvas>
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
    .container {
        margin-top: 5rem; /* Margine superiore per il contenitore */
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
</style>
@endsection
