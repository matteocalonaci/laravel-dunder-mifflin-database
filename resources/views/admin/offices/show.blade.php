@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container">
        <h1 class="mb-4 text-white text-center">{{ $office->Office_Name }}</h1>

        <div class="office-details-container">
            <!-- Sezione Dettagli Ufficio -->
            <div class="detail-card">
                <div class="detail-header bg-primary">
                    <i class="fas fa-building"></i>
                    <h3>Informazioni Ufficio</h3>
                </div>
                <div class="detail-body">
                    <div class="detail-row">
                        <span class="detail-label">Indirizzo:</span>
                        <span class="detail-value">{{ $office->Address }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Località:</span>
                        <span class="detail-value">Scranton, Pennsylvania</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Dipendenti:</span>
                        <span class="detail-value">
                            {{ $employees->count() }}
                        </span>
                    </div>
                </div>
            </div>
            <!-- Sezione Dipendenti -->
            <div class="detail-card">
                <div class="detail-body">
                    <div class="employees-list">
                        @forelse($employees as $employee)
                        <a href="{{ route('admin.employees.show', $employee->id) }}" class="employee-item-link">
                            <div class="employee-item">
                                <div class="employee-info">
                                    @if($employee->image)
                                        @if(filter_var($employee->image, FILTER_VALIDATE_URL))
                                            <img src="{{ $employee->image }}"
                                                 alt="{{ $employee->First_Name }}"
                                                 class="employee-image">
                                        @else
                                            <img src="{{ asset('storage/' . $employee->image) }}"
                                                 alt="{{ $employee->First_Name }}"
                                                 class="employee-image">
                                        @endif
                                    @else
                                        <div class="employee-image-default">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="employee-name">{{ $employee->First_Name }} {{ $employee->Last_Name }}</div>
                                        <div class="employee-role">{{ $employee->Role }}</div>
                                    </div>
                                </div>
                                <div class="employee-contacts">
                                    <div><i class="fas fa-envelope"></i> {{ $employee->Email }}</div>
                                    <div><i class="fas fa-phone"></i> {{ $employee->Phone }}</div>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div class="no-employees">Nessun dipendente assegnato</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sezione Mappa -->
            @if($office->Map_Link)
            <div class="detail-card">
                <div class="detail-header bg-info">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Posizione</h3>
                </div>
                <div class="map-container">
                    <iframe
                        src="{{ $office->Map_Link }}"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
            @endif
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

.office-details-container {
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 2rem;
}

.detail-card {
    margin-bottom: 2rem;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.detail-header {
    padding: 1rem;
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
}

.detail-header i {
    font-size: 1.5rem;
}

.detail-body {
    padding: 1rem;
    background-color: white;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.detail-label {
    font-weight: bold;
    min-width: 120px;
}

.detail-value {
    color: #666;
}

.employees-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.employee-item-link {
    text-decoration: none;
    color: inherit;
    display: block;
    transition: transform 0.2s ease;
}

.employee-item-link:hover {
    transform: translateY(-2px);
}

.employee-item-link:hover .employee-item {
    background-color: #f1f3f5;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.employee-item-link:active .employee-item {
    transform: scale(0.98);
    box-shadow: 0 2px 3px rgba(0,0,0,0.1);
}

.employee-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background-color: #f8f9fa;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
}

.employee-info {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 8px;
    border-radius: 8px;
}

.employee-image {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.employee-image:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.employee-image-default {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(45deg, #6c757d, #495057);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    border: 3px solid #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.employee-image-default i {
    filter: drop-shadow(0 2px 2px rgba(0,0,0,0.2));
}

.employee-name {
    font-weight: 500;
    color: #212529;
    margin-bottom: 2px;
}

.employee-role {
    color: #6c757d;
    font-size: 0.9rem;
    font-style: italic;
}

.employee-contacts {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 200px;
    align-items: flex-end;
}

.employee-contacts div {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #495057;
    font-size: 0.95rem;
}

.employee-contacts i {
    color: #6c757d;
    min-width: 20px;
    text-align: center;
}

.map-container {
    border-radius: 8px;
    overflow: hidden;
    margin-top: 1rem;
}

.no-employees {
    text-align: center;
    color: #6c757d;
    padding: 1.5rem;
    font-style: italic;
}

h1 {
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
            1px  1px 0 rgb(0, 0, 0);
    }

@media (max-width: 768px) {
    .container {
        margin-top: 4rem;
        padding: 10px;
    }

    .detail-row {
        flex-direction: column;
        gap: 5px;
    }

    .employee-item-link {
        width: 100%;
    }

    .employee-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.2rem;
        width: 100%;
    }

    .employee-image,
    .employee-image-default {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }

    .employee-contacts {
        align-items: flex-start;
        min-width: auto;
        width: 100%;
        padding-left: 65px;
        margin-top: 10px;
    }

    .employee-contacts div {
        flex-wrap: wrap;
    }

    .map-container iframe {
        height: 300px;
    }
}
</style>
