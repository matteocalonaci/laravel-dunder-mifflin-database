<!-- resources/views/admin/statistics/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-white">Statistiche Vendite</h1>

    @if ($topSellers->isNotEmpty())
        <h3>I Migliori Venditori del Mese:</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome Venditore</th>
                        <th>Vendite Totali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topSellers as $seller)
                        <tr>
                            <td>{{ $seller->employee->First_Name }} {{ $seller->employee->Last_Name }}</td>
                            <td>{{ $seller->total_sales }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Nessuna vendita registrata per questo mese.</p>
    @endif

    <div class="mt-4">
        <canvas id="salesChart" style="height: 300px; width: 100%;"></canvas> <!-- Imposta l'altezza del grafico -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($topSellers->pluck('employee.First_Name')->toArray()), // Ottieni i nomi dei venditori
            datasets: [{
                label: 'Vendite Totali',
                data: @json($topSellers->pluck('total_sales')->toArray()), // Ottieni le vendite totali
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, // Rendi il grafico responsive
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

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
            1px  1px 0 rgb(0, 0, 0);
    }
</style>
