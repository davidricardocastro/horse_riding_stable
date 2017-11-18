<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Talli Andantino</title>

    <meta name="google-site-verification" content="NiiCPfk6WwAm8q-Ou36omWALx5JwXGlvSJK5X_ezunM" />
    <meta name=”description” content="Tarjoamme ratsastustunteja 1-4 hengen ryhmissä tiistaista lauantaihin, myös aamuisin ja aamupäivisin. Perttula, Nurmijärvi"/>
    <meta name="title" content="Talli Andantino">
    

</head>
<body>
    <div class="top">
        <span class="main_font bigger_font ">Talli Andantino</span>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark custom_color1">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">                       
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto ">
                <li class="nav-item active px-2 ">
                    <a class="nav-link main_font bigger_font" href="{{ action('indexController@index') }}">Etusivu</a>
                </li>
                <li class="nav-item active px-2">
                    <a class="nav-link main_font bigger_font" href="{{ action('ridingController@riding') }}">Ratsastus</a>
                </li>
                <li class="nav-item active px-2">
                    <a class="nav-link main_font bigger_font" href="{{ action('stableController@stable') }}">Talli</a>
                </li>
                <li class="nav-item active px-2">
                    <a class="nav-link main_font bigger_font" href="{{ action('horseController@horse') }}">Hevoset</a>
                </li>
                <li class="nav-item active px-2">
                    <a class="nav-link main_font bigger_font" href="{{ action('contactController@contact') }}">Yhteystiedot</a>
                </li>
                <li class="nav-item active px-2">
                    <a class="nav-link main_font bigger_font" href="{{ action('userController@user') }}">Booking</a>
                </li>
<!-- Authentication Links -->
                @guest
                <!--
                    <li class="nav-item active px-2" >
                        <a class="nav-link main_font bigger_font" href="{{ route('login') }}">Kirjaudu sisään</a>
                    </li>
                    <li class="nav-item active px-2 main_font bigger_font"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
               -->
               
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                        @endguest


            </ul>
        </div>
    </nav>

    <!--informs user when loggin in or register is successful-->
    @if(session()->has('flash_notification'))
    <div class="alert alert-success">
    
    {{ session('flash_notification') }}

    </div>
    @endif
    
    <div class="container_background">
            @yield('content')      
    </div>

    <footer >
        <div class="container-fluid custom_color1 pt-3">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-3"><p class=" text-center nav_font" ><i class="fa fa-map-marker" aria-hidden="true"></i> Lopentie 6, 01860 Nurmijärvi </p></div>
                <div class="col-lg-12 col-xl-3"><p class=" text-center nav_font"><i class="fa fa-envelope-o" aria-hidden="true"></i> stallgranbacka@gmail.com </p> </div>
                <div class="col-lg-12 col-xl-3"><p class=" text-center nav_font"><i class="fa fa-phone " aria-hidden="true"></i> +358 452 312 398 </p> </div>
                
            </div>
        </div>
    </footer>
   
   
   <!-- this link is need for the dropdown menu in the navbar.-->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

    @yield('scripts')
</body>
</html>