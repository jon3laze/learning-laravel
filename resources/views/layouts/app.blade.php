<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="flex items-center justify-between flex-wrap p-6 shadow">
            <div class="flex items-center flex-no-shrink text-white mr-6">
                <a href="{{ url('/') }}" class="no-underline">
                    <i class="fal fa-3x fa-chart-network  fa-flip-horizontal text-white"></i>
                    <img src="/images/logo.svg" alt="network.run" class="svg-white">
                </a>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-end lg:w-auto">
                <div class="text-sm lg:flex-grow text-center">
                    <a href="/threads" class="no-underline rounded block mt-4 lg:inline-block lg:mt-0 text-white p-2 mr-4 hover:shadow-lg">forum</a>
                    @if(auth()->check())
                        <a href="/projects" class="no-underline rounded block mt-4 lg:inline-block lg:mt-0 text-white p-2 mr-4 hover:shadow-lg">projects</a>
                    @endif
                </div>
                <div class="flex text-white">
                    <!-- Authentication Links -->
                    @guest
                        <a class="no-underline text-white tracking-tight px-2 self-center" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            / <a class="no-underline text-white tracking-tight px-2 self-center" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="no-underline text-white tracking-tight px-2 self-center" href="#">{{ Auth::user()->name }}</a>
                        <a class="no-underline text-white p-2 rounded-full hover:text-red hover:shadow-lg hover:border-none" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="far fa-power-off"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>

    </div>
</body>
</html>
