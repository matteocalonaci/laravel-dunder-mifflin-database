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


<body class="loaded">
    <!-- Loader -->
    <div class="page-loader">
        <div class="loader"></div>
    </div>

    <div id="app">
        <nav class="navbar navbar-expand-md p-2 m-0 d-flex justify-content-between">
            <!-- ... resto della navbar invariato ... -->
        </nav>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Loader Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Rimuove il loader dopo il caricamento iniziale
            document.body.classList.add('loaded');

            // Gestione click su link
            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!this.href.includes(window.location.hostname)) return;
                    document.body.classList.remove('loaded');
                });
            });

            // Gestione submit form
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', () => {
                    document.body.classList.remove('loaded');
                });
            });

            // Gestione beforeunload
            window.addEventListener('beforeunload', () => {
                document.body.classList.remove('loaded');
            });
        });
    </script>

</html>

<style>
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
        pointer-events: none;
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
