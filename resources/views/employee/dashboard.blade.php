@extends('layouts.app')

@section('content')
<div class="background-image">
<div class="container m-top">
    <h1 class="text-center text-white">Benvenuto, {{ Auth::user()->name }}</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body bg-primary text-white">
                    <h5 class="card-title">Profilo</h5>
                    <a href="{{ route('employee.profile') }}" class="btn btn-light">Vai</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body bg-success text-white">
                    <h5 class="card-title">Ordini Effettuati</h5>
                    <a href="{{ route('employee.orders.index') }}" class="btn btn-light">Vai</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body bg-warning text-white">
                    <h5 class="card-title">Nuovo Ordine</h5>
                    <a href="{{ route('employee.orders.create') }}" class="btn btn-light">Vai</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body bg-info text-white">
                    <h5 class="card-title">Lista Clienti</h5>
                    <a href="{{ route('employee.customers.index') }}" class="btn btn-light">Vai</a>
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
    .card-body {
        border-radius: 0.5rem;
    }
    .background-image
        {
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
</style>
