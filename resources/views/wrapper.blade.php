<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

</body>
</html>