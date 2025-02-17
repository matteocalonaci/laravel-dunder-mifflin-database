@extends('layouts.app')

@section('content')
<div class="background-image">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10 col-12"> <!-- Aggiunto col-sm-10 e col-12 per la responsività -->
                <div class="card">
                    <div class="card-header text-center">{{ __('Login') }}</div> <!-- Centra il titolo -->

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6 col-12"> <!-- Aggiunto col-12 per la responsività -->
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6 col-12"> <!-- Aggiunto col-12 per la responsività -->
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4 col-12"> <!-- Aggiunto col-12 per la responsività -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 offset-md-4 col-12"> <!-- Aggiunto col-12 per la responsività -->
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
    .background-image {
        background-image: url('https://orgoglionerd.it/wp-content/uploads/2024/05/The-Offce-reboot-ufficiale-cosa-sappiamo-sulla-serie-1024x576.webp');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-top: 2rem;
    }

    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .btn-primary {
        width: 100%;
        padding: 0.75rem;
    }

    /* Media query per tablet */
    @media (min-width: 768px) and (max-width:1024px) {
        .card {
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 1rem
        }

        .card-header {
            font-size: 1.75rem;
        }

        .form-control {
            font-size: 1.1rem;
            padding: 0.75rem;
        }

        .btn-primary {
            padding: 1rem;
            font-size: 1.1rem;
        }
    }

    /* Media query per schermi più piccoli */
    @media (max-width: 576px) {
        .card {
            margin-top: 1rem;
        }
    }
</style>
