@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="text-white">Il mio Profilo</h1>

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
                        <p><strong>Data di Assunzione:</strong> {{ $employee->hired_at ? \Carbon\Carbon::parse($employee->hired_at)->format('d/m/Y') : 'N/A' }}</p>
                    </div>

                    <div class="col-md-3 text-center">
                        @if($employee->image)
                            @if(filter_var($employee->image, FILTER_VALIDATE_URL))
                                <!-- Se l'immagine è un URL valido -->
                                <img src="{{ $employee->image }}" alt="Immagine di {{ $employee->First_Name }}" class="img-fluid custom-image">
                            @else
                                <!-- Se l'immagine è salvata nello storage -->
                                <img src="{{ asset('storage/' . $employee->image) }}" alt="Immagine di {{ $employee->First_Name }}" class="img-fluid custom-image">
                            @endif
                        @else
                            <p>Immagine non disponibile.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

<style scoped>
    html, body {
        height: 100%;
        margin: 0;
    }


    .custom-image {
    width: 100%;
    height: auto;
    max-width: 300px;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

    .background-image {
        background-image: url('https://s.wsj.net/public/resources/images/MK-BQ669_DUNDER_G_20111127202517.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        min-height: 100vh;
        align-items: flex-start;
        justify-content: center;
    }

    .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 20px;
        margin-top: 5rem;
        height: 100%;
        overflow-y: auto;
        scrollbar-width: none;
    }

    .container::-webkit-scrollbar {
        display: none;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .sales-summary {
        background: rgba(248, 249, 250, 0.8);
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
        margin-top: 6rem;
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
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
