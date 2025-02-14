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

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md p-0 m-0 d-flex justify-content-center">
            <div class="app-container d-flex justify-content-between align-items-center p-3">
                <div class="d-flex align-items-center"> <!-- Flex container for logo and home link -->
                    <div class="logo_dunder_mifflin mx-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Dunder_Mifflin%2C_Inc.svg/1200px-Dunder_Mifflin%2C_Inc.svg.png" alt="">
                    </div>
                    <a class="nav-link" href="{{ url('/') }}">{{ __('HOME') }}</a> <!-- Home link next to logo -->
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto"> <!-- Use ms-auto to push items to the right -->
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>

<style scoped>
    .app-container {
        position: fixed;
        top: 0;
        z-index: 999;
        width: 100%;
        padding: 0;
    }

    .logo_dunder_mifflin img {
        width: 100px;
        height: auto;
    }

    .navbar-nav {
        margin: 0; /* Remove margin from navbar items */
    }

    .nav-link {
        padding: 0.2rem 0.8rem; /* Adjust padding for nav links */
        color: white; /* Change text color to black for better visibility */
        text-shadow:
            -1px -1px 0 rgb(0, 0, 0),
             1px -1px 0 rgb(0, 0, 0),
            -1px  1px 0 rgb(0, 0, 0),
             1px  1px 0 rgb(0, 0, 0); /* Red outline */
    }

    .nav-link:hover {
        border-radius: 2rem;
        color: white; /* Change text color to black for better visibility */
        text-decoration: underline;
        background-color: rgba(255, 255, 0, 0.651);
    }
</style>
