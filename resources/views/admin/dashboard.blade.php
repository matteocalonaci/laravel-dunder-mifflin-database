@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container m-top">
        <h1 class="text-center text-white">Benvenuto, {{ Auth::user()->name }}</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title">Gestisci Dipendenti</h5>
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-light">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body bg-success text-white">
                        <h5 class="card-title">Gestisci Ordini</h5>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-light">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body bg-warning text-white">
                        <h5 class="card-title">Statistiche vendite</h5>
                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-light">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body bg-info text-white">
                        <h5 class="card-title">Gestisci Clienti</h5>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-light">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body bg-secondary text-white">
                        <h5 class="card-title">Gestisci Dipartimenti</h5>
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-light">Vai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">Gestisci Fornitori</h5>
                        <a href="{{ route('admin.suppliers.index') }}" class="btn btn-light">Vai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
    .m-top {
        margin-top: 10rem;
    }
    .card {
        border: none; /* Rimuove il bordo della card */
    }
    .card-body {
        border-radius: 0.5rem; /* Mantieni il border-radius se necessario */
        padding: 1rem; /* Puoi regolare il padding se necessario */
        transition: background-color 0.3s ease; /* Aggiunta transizione */
    }
    .card .card-body:hover {
    background-color: rgba(255, 0, 0, 0.5); /* Colore di sfondo al passaggio del mouse */
    }
    .background-image {
        background-image: url('https://i.pinimg.com/736x/ce/c9/5d/cec95dff12ad93d7c9a12faf9e0905fa.jpg');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        padding: 2rem;
        position: relative;
    }
    h1, h5 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

    @media (max-width: 768px) {
        .m-top {
            margin-top: 3rem;
        }
    }
</style>
