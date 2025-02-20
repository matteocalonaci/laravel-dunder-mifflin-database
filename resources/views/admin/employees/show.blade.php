@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white">Dettagli Dipendente</h1>

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
                    <div class="col-md-3 text-center">
                        @if($employee->image)
                        <img src="{{ $employee->image }}" alt="Immagine di {{ $employee->First_Name }}" class="img-fluid custom-image" style="width: 100%; max-width: 300px;">
                        @else
                            <p>Immagine non disponibile.</p>
                        @endif
                    </div>
                </div>
                <div class="mt-3">
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
            <h3>📊 Prestazioni di vendita</h3>
            <div class="stats">
                <div class="stat-item">
                    <span class="label">Totale Ordini:</span>
                    <span class="value">{{ $employee->orders->count() }}</span>
                </div>
                <div class="stat-item">
                    <span class="label">Totale Prodotti Venduti:</span>
                    <span class="value">{{ $employee->orders->sum('Quantity') }}</span>
                </div>
            </div>
            <h4>Transazioni Recenti</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Prodotti</th>
                        <th>Quantità</th>
                        <th>Cliente</th>
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
</div>
@endsection

<style>
    html, body {
        height: 100%; /* Assicurati che html e body occupino l'intera altezza */
        margin: 0; /* Rimuovi il margine predefinito */
    }

    .background-image {
        background-image: url('https://s.wsj.net/public/resources/images/MK-BQ669_DUNDER_G_20111127202517.jpg');
        background-size: cover; /* Assicura che l'immagine copra l'intero sfondo */
        background-position: center; /* Centra l'immagine */
        display: flex;
        align-items: flex-start; /* Allinea gli elementi all'inizio */
        justify-content: center; /* Centra il contenuto orizzontalmente */
    }

    .container {
        flex: 1; /* Permette al contenitore di crescere e riempire lo spazio disponibile */
        display: flex;
        flex-direction: column; /* Impila i figli verticalmente */
        justify-content: flex-start; /* Allinea i figli in alto */
        padding: 20px; /* Aggiungi un padding per il contenuto */
        height: 100%; /* Assicura che il contenitore occupi l'intera altezza */
        overflow-y: auto; /* Permette lo scorrimento verticale */
        scrollbar-width: none; /* Nasconde la scrollbar in Firefox */
    }

    .container::-webkit-scrollbar {
        display: none; /* Nasconde la scrollbar in Chrome, Safari e Edge */
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9); /* Sfondo bianco con 90% di opacità */
        border: none; /* Rimuovi il bordo */
        border-radius: 10px; /* Angoli arrotondati */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombra per profondità */
        margin-bottom: 20px; /* Margine inferiore per separare le card */
    }

    .sales-summary {
        background: rgba(248, 249, 250, 0.8); /* Sfondo chiaro con trasparenza */
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

    h1 {
        margin-top: 6rem; /* Aggiungi margine superiore per evitare sovrapposizioni con l'header */
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

    @media (max-width: 768px) {
        h1 {
            margin-top: 8rem; /* Aggiusta il margine superiore per dispositivi mobili */
        }
    }
</style>
