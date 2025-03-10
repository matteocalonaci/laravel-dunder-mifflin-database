@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="mb-4 text-white text-center">Elenco Uffici</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.offices.create') }}" class="btn btn-primary width-mobile mb-3">Nuovo Ufficio</a>

        <div class="table-container">
            <div class="table-header">
                <div class="col-nome">Nome Ufficio</div>
                <div class="col-luogo">Località</div>
                <div class="col-azioni">Azioni</div>
            </div>
            <div class="table-body">
                @foreach($offices as $office)
                <div class="table-row">
                    <div class="col-nome">{{ $office->Office_Name }}</div>
                    <div class="col-luogo">{{ $office->Address }}</div>
                    <div class="col-azioni">
                        <a href="{{ route('admin.offices.show', $office->id) }}" class="btn btn-info btn-sm" aria-label="Dettagli">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.offices.edit', $office->id) }}" class="btn btn-warning btn-sm" aria-label="Modifica">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.offices.destroy', $office->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro?')" aria-label="Elimina">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>
@endsection

<style scoped>
.background-image {
    background-image: url('https://media.glassdoor.com/l/1d/0c/e0/81/the-office.jpg?signature=08ee453a9f01b8338e79ea01fbec6f37e094f657ed4f6d408ef3989eef66df91');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    display: flex;
    align-items: flex-start;
    flex-direction: column;
}

.container {
    max-width: 100%;
    margin-top: 5rem;
    padding: 20px;
    overflow: hidden;
}

.table-container {
    display: flex;
    flex-direction: column;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    overflow: hidden;
    max-height: 70vh;
    overflow-y: auto;
    width: 100%;
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
    gap: 15px; /* Aggiunto spazio tra le colonne */
}

.col-nome {
    flex: 1;
    text-align: center;
}

.col-luogo {
    flex: 1;
    text-align: center;
}

.col-azioni {
    flex: 1;
    display: flex;
    justify-content: center;
}
.btn-info {
            width: 2rem;
            height: 1.5rem;
            margin-right: 0.5rem;
        }
        .btn-warning {
            width: 2rem;
            height: 1.5rem;
            margin-right: 0.5rem;
        }
        h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

/* Versione mobile */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    .table-container {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        max-height: 60vh;
        overflow-y: auto;
    }

    .table-header {
        display: none;
    }

    .table-row {
        flex-direction: column;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table-row div {
        width: 100%;
        margin-bottom: 8px;
        display: flex;
    }

    .col-nome::before {
        content: "Nome Ufficio: ";
        font-weight: bold;
        margin-right: 10px;
    }

    .col-luogo::before {
        content: "Località: ";
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .col-azioni {
        justify-content: flex-start; /* Allinea a sinistra */
        padding-left: 0;
        margin-left: 0;
        width: 100%;
    }

    .col-azioni::before {
        content: "Azioni: ";
        font-weight: bold;
        margin-right: 10px;
        flex-shrink: 0; /* Impedisce il restringimento */
    }

    .col-azioni form,
    .col-azioni a {
        margin-right: 8px; /* Spazio tra i pulsanti */
    }
}
</style>
