<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
         <!-- Loader -->
    <div class="page-loader">
        <div class="loader"></div>
    </div>
        <nav class="navbar navbar-expand-md p-2 m-0 d-flex justify-content-between">
            <div class="app-container d-flex align-items-center w-100">
                <div class="logo_dunder_mifflin">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Dunder_Mifflin%2C_Inc.svg/1200px-Dunder_Mifflin%2C_Inc.svg.png" alt="Logo Dunder Mifflin">
                </div>

                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::check() ? (Auth::user()->isAdmin() ? route('admin.dashboard') : route('employee.dashboard')) : url('/') }}">
                            {{ __('HOME') }}
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role === 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.employees.index') }}">{{ __('Gestisci Dipendenti') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.orders.index') }}">{{ __('Gestisci Ordini') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.customers.index') }}">{{ __('Gestisci Clienti') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.departments.index') }}">{{ __('Gestisci Dipartimenti') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.suppliers.index') }}">{{ __('Gestisci Fornitori') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.statistics.index') }}">{{ __('Statistiche') }}</a>
                                @elseif(Auth::user()->role === 'employee')
                                <a class="dropdown-item" href="{{ route('employee.dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="{{ route('employee.profile') }}">{{ __('Profilo') }}</a>
                                    <a class="dropdown-item" href="{{ route('employee.orders.index') }}">{{ __('I miei Ordini') }}</a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

<style>
    /* Stili del loader */
    .page-loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: white;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .loader {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loaded .page-loader {
        opacity: 0;
    }
</style>

<style scoped>
    body {
        margin: 0;
        padding: 0;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999;
        padding: 0;
    }

    .app-container {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .logo_dunder_mifflin img {
        width: 100px;
        height: auto;
    }

    .navbar-nav {
        margin: 0;
    }

    .nav-link {
        padding: 0.5rem 1rem;
        color: white;
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
             1px  1px 0 rgb(0, 0, 0);
    }

    .nav-link:hover {
        border-radius: 2rem;
        color: white;
        text-decoration: underline;
        background-color: rgba(255, 255, 0, 0.651);
    }

    @media (max-width: 768px) {
        .navbar-nav {
            display: flex !important;
            flex-direction: column;
        }

        .navbar-collapse {
            background-color: rgba(0, 0, 0, 0.563);
            position: absolute;
            top: 5rem;
            right: 0;
            left: 0;
            z-index: 1000;
        }

        .dropdown-menu {
            position: relative;
            margin-top: 0;
            width: 100%;
        }

        .dropdown-item {
            color: rgb(0, 0, 0);
        }

        .dropdown-item:hover {
            background-color: rgba(255, 255, 0, 0.651);
        }
    }

    @media (min-width: 769px) {
        .dropdown-menu[data-bs-popper] {
            top: 100%;
            right: 0.5rem;
            left: auto;
            transform: translateX(0);
            margin-top: var(--bs-dropdown-spacer);
        }
    }
</style>
