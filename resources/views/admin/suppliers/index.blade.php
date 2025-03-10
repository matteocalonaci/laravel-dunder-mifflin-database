@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-5">
        <h1 class="text-white text-center mb-4">Elenco Fornitori</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary width-mobile mb-3">Crea Nuovo Fornitore</a>

        <div class="table-container">
            <div class="table-header">
                <div class="col-id">ID</div>
                <div class="col-nome">Nome Fornitore</div>
                <div class="col-contatto">Numero di Contatto</div>
                <div class="col-prodotto">Prodotto</div>
                <div class="col-azioni">Azioni</div>
            </div>
            <div class="table-body">
                @foreach($suppliers as $supplier)
                    <div class="table-row">
                        <div class="col-id">{{ $supplier->id }}</div>
                        <div class="col-nome">{{ $supplier->Supplier_Name }}</div>
                        <div class="col-contatto">{{ $supplier->Contact_Info }}</div>
                        <div class="col-prodotto">{{ $supplier->Products_Offered }}</div>
                        <div class="col-azioni">
                            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm mx-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pagination-container mt-3">
            <div class="pagination-wrapper">
                {{ $suppliers->links('pagination::bootstrap-4') }} <!-- Paginazione -->
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
    .background-image {
        background-image: url('https://media.timeout.com/images/105824238/750/422/image.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
    }

    .container {
        margin-top: 3rem;
        max-width: 100%;
        padding: 20px;
        height: 100%;
        overflow-y: auto;
        scrollbar-width: none;
    }

    .container::-webkit-scrollbar {
        display: none;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        overflow: hidden;
        max-height: 70vh;
        overflow-y: auto;
    }

    .table-header, .table-row {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .table-header {
        background-color: rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }

    .table-body {
        overflow-y: auto;
    }

    .table-row {
        display: flex;
        padding: 10px;
    }

    .table-header, .table-row {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .table-header div, .table-row div {
        text-align: left;
        min-width: 0; /* Previene l'overflow */
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .col-id {
        flex: 0 0 70px; /* Larghezza fissa aumentata */
        text-align: center;
    }

    .col-nome {
        flex: 1; /* Priorità maggiore per il nome */
    }

    .col-contatto {
        flex: 1;
s    }

    .col-prodotto {
        flex: 0 0 380px;
    }

    .col-azioni {
        flex: 0 0 80px;
        display: flex;
        justify-content: flex-end;
        gap: 5px;
    }
    .btn-warning {
            width: 2rem;
            height: 1.5rem;
        }

h1, label {
    text-shadow:
        -1px -1px 0 rgb(0, 0, 0),
         1px -1px 0 rgb(0, 0, 0),
        -1px  1px 0 rgb(0, 0, 0),
        1px  1px 0 rgb(0, 0, 0);
}

.pagination-container {
    overflow-x: auto;
}

.pagination-wrapper {
    display: flex;
    justify-content: center;
    padding: 10px 0;
}

@media (max-width: 768px) {
    .table-header {
        display: none;
    }

    .table-row {
        flex-direction: column;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .table-row div {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 5px;
        width: 100%;
    }

    .col-id::before {
        content: "ID: ";
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .col-nome::before {
        content: "Nome Fornitore: ";
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .col-contatto::before {
        content: "Numero di Contatto: ";
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .col-prodotto::before {
        content: "Indirizzo: ";
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .col-azioni::before {
        content: "Azioni: ";
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .btn-warning {
            width: 2rem;
            height: 1.5rem;
        }
        .width-mobile{
            width: 100%;
        }
        .col-id {
            flex: 1;
}

    .col-nome {
        flex: 1;
    }

    .col-contatto {
        flex: 1;
    }

    .col-prodotto {
        flex: 1;
    }

    .col-azioni {
        flex: 1;

    }
}
</style>
