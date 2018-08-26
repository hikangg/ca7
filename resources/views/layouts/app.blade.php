<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::guest())
                            {{-- When not logged in--}}
                            {{-- Menu option--}}
                            {{--<li><a href="{{ url('/text') }}">Text</a></li>--}}
                        @else
                            {{--When logged in--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Lists<span class="caret"></span>
                                </a>

                                <!--<ul class="dropdown-menu" role="menu">
                                    {{--Manufacturers menu option--}}
                                    <li>
                                        <a href="{{ url('/manufacturers') }}">
                                            Manufacturers
                                        </a>
                                    </li>
                                    {{--Brands menu option--}}
                                    <li>
                                        <a href="{{ url('/brands') }}">
                                            Brands
                                        </a>
                                    </li>
                                    {{--Brandmodels menu option--}}
                                    <li>
                                        <a href="{{ url('/brandmodels') }}">
                                            Models
                                        </a>
                                    </li>
                                    {{--Baskets menu option--}}
                                    <li>
                                        <a href="{{ url('/baskets') }}">
                                            Baskets
                                        </a>
                                    </li>
                                </ul>-->
                            </li>
                        @endif&nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            {{-- When not logged in--}}
                            {{--Login menu option--}}
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            {{--Register menu option--}}
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            {{--When logged in--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    {{--Security menu option--}}
                                    <li>
                                        <a href="{{ url('/security') }}">
                                            Security
                                        </a>
                                    </li>

                                    {{--Logout menu option--}}
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
