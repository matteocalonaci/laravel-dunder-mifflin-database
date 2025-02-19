@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettagli Dipendente</h1>

    <div class="card">
        <div class="card-header">
            {{ $employee->First_Name }} {{ $employee->Last_Name }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <p><strong>ID:</strong> {{ $employee->id }}</p>
                    <p><strong>Nome:</strong> {{ $employee->First_Name }}</p>
                    <p><strong>Cognome:</strong> {{ $employee->Last_Name }}</p>
                    <p><strong>Telefono:</strong> {{ $employee->Phone }}</p>
                    <p><strong>Email:</strong> {{ $employee->Email }}</p>
                    <p><strong>Dipartimento:</strong> {{ $employee->department ? $employee->department->Department_Name : 'N/A' }}</p>
                </div>
                <div class="col-md-3 text-center"> <!-- Centra l'immagine -->
                    @if($employee->image)
                    <img src="{{ $employee->image }}" alt="Immagine di {{ $employee->First_Name }}" class="img-fluid custom-image" style="width: 300px"> <!-- Modifica qui -->
                    @else
                        <p>Immagine non disponibile.</p>
                    @endif
                </div>
            </div>
            <div class="mt-3"> <!-- Aggiungi margine superiore -->
                <a href="{{ route('admin.employees.index') }}" class="btn btn-primary">Torna alla lista</a>
                <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning">Modifica</a>
                <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo dipendente?');">Elimina</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Sales Summary Section --}}
    @if($employee->department && $employee->department->Department_Name === 'Vendite')
    <div class="sales-summary">
        <h3>📊 Sales Performance</h3>

        <div class="stats">
            <div class="stat-item">
                <span class="label">Total Orders:</span>
                <span class="value">{{ $employee->orders->count() }}</span>
            </div>

            <div class="stat-item">
                <span class="label">Total Products Sold:</span>
                <span class="value">{{ $employee->orders->sum('Quantity') }}</span>
            </div>
        </div>

        {{-- Optional: Detailed Sales List --}}
        <h4>Recent Transactions</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Customer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee->orders as $order)
                <tr>
                    <td>{{ $order->Order_Date->format('d/m/Y') }}</td>
                    <td>{{ $order->product->name ?? 'N/A' }}</td>
                    <td>{{ $order->Quantity }}</td>
                    <td>{{ $order->customer->Customer_Name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection

<style>
/* resources/css/app.css */
.sales-summary {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-top: 20px;
}

.stat-item {
    display: flex;
    justify-content: space-between;
    margin: 10px 0;
    padding: 10px;
    background: white;
    border-radius: 4px;
}

.label {
    font-weight: 600;
    color: #2c3e50;
}

.value {
    color: #3498db;
    font-weight: 700;
}

.table {
    margin-top: 15px;
    width: 100%;
}
</style>
