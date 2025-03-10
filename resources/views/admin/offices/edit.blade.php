@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="mb-4 text-white text-center">Modifica Ufficio: {{ $office->Office_Name }}</h1>

        <div class="office-edit-container">
            <form action="{{ route('admin.offices.update', $office->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="detail-card">
                    <div class="detail-header bg-primary">
                        <i class="fas fa-edit"></i>
                        <h3>Modifica Dettagli</h3>
                    </div>
                    <div class="detail-body">
                        <div class="form-group">
                            <label for="Office_Name">Nome Ufficio</label>
                            <input type="text"
                                   class="form-control"
                                   id="Office_Name"
                                   name="Office_Name"
                                   value="{{ old('Office_Name', $office->Office_Name) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="Address">Indirizzo</label>
                            <input type="text"
                                   class="form-control"
                                   id="Address"
                                   name="Address"
                                   value="{{ old('Address', $office->Address) }}"
                                   required>
                        </div>

                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Salva Modifiche
                    </button>
                    <a href="{{ route('admin.offices.show', $office->id) }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times"></i> Annulla
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

<style scoped>
.background-image {
    background-image: url('https://media.glassdoor.com/l/1d/0c/e0/81/the-office.jpg?signature=08ee453a9f01b8338e79ea01fbec6f37e094f657ed4f6d408ef3989eef66df91');
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    min-height: 100vh;
    overflow-y: auto;
}

.container {
    margin-top: 3rem;
    max-width: 100%;
    padding: 20px;
    overflow: visible;
    min-height: 100vh;
}

.office-edit-container {
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    padding: 2rem;
    max-width: 800px;
    margin: 0 auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.detail-card {
    margin-bottom: 2rem;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.detail-header {
    padding: 1.5rem;
    color: white;
    display: flex;
    align-items: center;
    gap: 15px;
    background: linear-gradient(45deg, #007bff, #0062cc);
}

h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

.detail-header i {
    font-size: 1.8rem;
}

.detail-body {
    padding: 1.5rem;
    background-color: white;
}

.form-group {
    margin-bottom: 1.8rem;
}

.form-group label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.8rem;
    display: block;
    font-size: 1rem;
}

.form-control {
    border: 2px solid #dee2e6;
    border-radius: 8px;
    padding: 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
}

.form-actions {
    margin-top: 2.5rem;
    display: flex;
    gap: 1.5rem;
    justify-content: flex-end;
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    transition: transform 0.2s ease;
}

.btn-lg:hover {
    transform: translateY(-2px);
}

.btn-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
    border: none;
}

.btn-secondary {
    background: linear-gradient(45deg, #6c757d, #5a6268);
    border: none;
}
@media (max-width: 768px) {
    .background-image {
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .container {
        margin-top: 4rem; /* Manteniamo il margin-top */
        padding: 10px;
        flex: 1;
        min-height: calc(100vh - 4rem - 20px); /* 4rem margin-top + 10px padding top/bottom */
        display: flex;
        flex-direction: column;
    }

    .office-edit-container {
        padding: 1rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        max-height: 100%;
    }

    form {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .detail-card {
        flex: 1;
        margin-bottom: 0;
        min-height: 0;
        display: flex;
        flex-direction: column;
    }

    .detail-header {
        padding: 0.8rem;
        flex-shrink: 0;
    }

    .detail-body {
        flex: 1;
        overflow-y: auto;
        padding: 0.8rem;
    }

    .form-actions {
        flex-shrink: 0;
        padding-top: 1rem;
        margin-top: auto;
    }

    .btn-lg {
        padding: 0.8rem;
        font-size: 0.95rem;
    }
}
</style>
