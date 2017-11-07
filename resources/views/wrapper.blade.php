<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="./css/style.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">-->
    <title> Talli Andantino</title>
    <style>
        /*@font-face {
        font-family: Playball-Regular;
        src: url('/fonts/Playball-Regular.tff');
        }*/
        
    </style>
</head>
<body>
    <div class="top">
        <h1 class="main_font bigger_font text-light">Talli Andantino</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    <a class="nav-link main_font bigger_font" href="{{ action('adminController@admin') }}">Booking</a>
                </li>
<!-- Authentication Links -->
@guest
                    <li class="nav-item active px-2" >
                        <a class="nav-link main_font bigger_font" href="{{ route('login') }}">Kirjaudu sisään</a>
                    </li>
                    <li class="nav-item active px-2 main_font bigger_font"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
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

    <div class="container_background">
            @yield('content')      
    </div>

    <footer >
        <div class="container-fluid base_dark_background_color">
            <div class="row">
                <div class="col p-2">
                   
                   <p class=" text-center text-white main_font bigger_font" >Talli Andantino | Lopentie 6, Nurmijärvi | +358 452 312 398
                </p>
                </div>
                
            </div>
        </div>
    </footer>
   
   
   <!-- this link is need for the dropdown menu in the navbar.-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    
    

 <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script> 
  
</body>
</html>