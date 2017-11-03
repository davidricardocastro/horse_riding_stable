<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="./css/style.css">
    <title> Klaukkala Stable</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Etusivu</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('ridingController@riding') }}">Ratsastus</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('stableController@stable') }}">Tali</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('horseController@horse') }}">Hevoset</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('contactController@contact') }}">Yhteydenotto</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('adminController@admin') }}">Booking</a>
                </li>
<!-- Authentication Links -->
@guest
                            <li class="nav-item active" >
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest


            </ul>
        </div>
    </nav>
    @yield('content')

    <footer>
        <div class="container-fluid base_dark_background_color">
            <div class="row">
                <div class="col">
                    <p class="text-left text-white">
                    Klaukkala Stable, LLC
                    </p>
                </div>
                <div class="col">
                    <p class="text-right text-white">
                    Tel: +35965165654<br>
                    Location: Address 123 Finish st.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>