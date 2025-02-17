@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12"> <!-- Aggiunto col-12 per schermi più piccoli -->
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style scoped>
    @media (max-width: 768px) {
        .card {
            margin-top: 15rem; /* Aggiungi margine per separare la card dai bordi dello schermo */
        }

        .alert {
            margin-bottom: 1rem; /* Aggiungi margine inferiore per l'alert */
        }
    }

    @media (min-width: 769px) and (max-width: 992px) { /* Tablet */
        .card {
        margin-top: 15rem; /* Aggiungi margine per separare la card dai bordi dello schermo */
            ; /* Aggiungi margine per separare la card dai bordi dello schermo */
        }
    }
</style>
