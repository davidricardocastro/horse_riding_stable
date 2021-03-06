@extends('wrapper')


@section('seoMeta')
<link rel="canonical" href="https://www.andantino.fi/yhteystiedot/">
<meta name="description" content="Andantinon yhteystiedot ja yhteydenottolomake."/>
<meta name="title" content="Talli Andantino - Yhteystiedot">
    
<title>Talli Andantino - Yhteystiedot</title>
@endsection

@section('content')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="container background_light p-4">
    <div class="row">
<div class="col-12 pb-2">
<h1>Yhteystiedot</h1>

<br>

<p class="m-0"><i class="fa fa-map-marker" aria-hidden="true"></i> Lopentie 6, 01860 Nurmijärvi</p>
<p class="m-0"><a href="tel:+358452312398"><i class="fa fa-phone " aria-hidden="true"></i></a> +358 452 312 398</p>
<p class="m-0"><i class="fa fa-envelope-o" aria-hidden="true"></i> talli@andantino.fi </p>
<p class="m-0"> <a target="_blank" title="follow me on facebook" href="https://www.facebook.com/talliandantino/"><i class="fa fa-facebook-square"></i></a> facebook.com/talliandantino </p> 
<br>
<h4>Tmi Henri Pohjonen</h4>
<p class="m-0"><i class="fa fa-tag"></i> Y-tunnus 2921382-7</p>
<p class="m-0"><i class="fa fa-building"></i> Pankkiyhteys - Nordea: FI46 1029 3500 4673 02 </p>
<div><br>Copyright<i class="fa fa-copyright"></i> Tmi Henri Pohjonen</div>
<br>
</div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       
        <div class="col-12 mt-3">
            <p>Voitte ottaa meihin yhteyttä alla olevalla lomakkeella:</p>
        </div>


        <div class="col col-md-8 col-lg-6">
            <form action="{{ action('contactController@store') }}" method="post">
            {{ csrf_field()}}
                <div class="form-group">
                    <label for="name">Nimi</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="" required>
                </div>
                <div class="form-group">
                    <label for="email">Sähköposti</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="" value="" required>
                </div>
                <div class="form-group">
                    <label for="phone">Puhelinnumero</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="" value="" required>
                </div>
                <div class="form-group">
                    <label for="message">Viesti</label>
                    <textarea class="form-control" id="message" rows="6" value=""  name="message" required></textarea>
                </div>
            
                   {!! Recaptcha::render() !!} 
                    <br>
                <button class="btn btn-success" id="send_btn" type="submit">
                    Lähetä
                </button>
            </form>
        </div>
       
    </div>

    




</div>

@endsection