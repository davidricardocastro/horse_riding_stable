<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  
    <title> Klaukkala Stable</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Klaukkala Stable</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="{{ action('ridingController@riding') }}">Riding</a></li>
            <li><a href="{{ action('stableController@stable') }}">Stable</a></li>
            <li><a href="{{ action('horseController@horse') }}">Team</a></li>
            <li><a href="{{ action('contactController@contact') }}">Contact</a></li>
            <li><a href="{{ action('adminController@admin') }}">User</a></li>
        </ul>
    </div>
</nav>
@yield('content')

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

</body>
</html>