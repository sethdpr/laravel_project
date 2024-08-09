<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Manchester United') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9tdzj0O3I1O5f5eELrI1Dk8gQ77F6z+J6MGpY9W1Tjp3rYZv1T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUjbjzM0CK6yR0r7M4O4c6Z2hDlfV+Y7j4sDDH5W1eBXTpVf5uF" crossorigin="anonymous"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Verander achtergrondkleur naar rood */
        .navbar {
            background-color: #d32f2f !important; /* Rode kleur */
        }

        /* Zorg ervoor dat de tekstkleur wit is */
        .navbar .navbar-brand,
        .navbar .nav-link,
        .navbar .dropdown-item {
            color: white !important;
        }

        /* Verander tekstkleur bij hover */
        .navbar .nav-link:hover,
        .navbar .dropdown-item:hover {
            color: #ffeb3b !important; /* Gele kleur bij hover */
        }

        /* Verwijder de pijl op de dropdown-toggle */
        .dropdown-toggle::after {
            display: none !important;
        }

        /* Style voor logo */
        .navbar-brand img {
            height: 30px; /* Pas de hoogte aan indien nodig */
            width: auto; /* Zorg ervoor dat de breedte automatisch wordt aangepast */
            margin-right: 10px; /* Ruimte tussen het logo en de tekst */
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            position: absolute !important; /* Zorg ervoor dat het menu absoluut gepositioneerd is */
            top: 100%; /* Positioneer het menu direct onder de knop */
            left: 0;
            z-index: 1050; /* Zorg ervoor dat het menu boven andere elementen wordt weergegeven */
            background-color: #d32f2f; /* Achtergrondkleur van het dropdown-menu */
            min-width: 160px; /* Zorg ervoor dat het menu voldoende breed is */
        }

        /* Verander achtergrondkleur van dropdown items bij hover */
        .dropdown-menu .dropdown-item:hover {
            background-color: red; /* Gele kleur bij hover */
        }

        /* Zorg ervoor dat de dropdown-menu in het midden van de naam staat */
        .dropdown-menu-end {
            right: 0;
            left: auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="dropdown">
                    <a class="navbar-brand dropdown-toggle" href="#" id="appNameDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/manchester_united_logo_1.png') }}" alt="Manchester United Logo">
                        Manchester United
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="appNameDropdown">
                        <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                        <li><a class="dropdown-item" href="{{ route('squad') }}">Squad</a></li>
                        <li><a class="dropdown-item" href="{{ route('legends') }}">Legends</a></li>
                        <li><a class="dropdown-item" href="{{ route('calendar') }}">Calendar</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', ['name' => Auth::user()->name]) }}">
                                        {{ __('Profile') }}
                                    </a>    
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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
