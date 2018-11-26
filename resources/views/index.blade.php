@extends('wrapper')

@section('seoMeta')
<link rel="canonical" href="https://www.andantino.fi/">
<meta name="description" content="Tarjoamme ratsastustunteja pienryhmissä tiistaista lauantaihin, myös aamuisin ja aamupäivisin. Perttula, Nurmijärvi."/>
<meta name="title" content="Talli Andantino - Ratsastustunnit 1-4 hengen ryhmissä - Perttula, Nurmijärvi">
    
<title>Talli Andantino - Ratsastustunnit 1-4 hengen ryhmissä - Perttula, Nurmijärvi</title>
@endsection

@section('content')

<div class="container background_light p-4 secondary_font">
    <h1 class="text-center">Talli Andantino </h1> <h2 class="text-center">Ratsastustunnit 1-4 hengen ryhmissä Perttulassa, Nurmijärvellä</h2>   
</div>

<div class="container background_light p-4 mt-3">
    <img class="img-fluid" src="{{url ('/img/hero.jpg') }}" alt="black horse">
</div>

<div class="container background_light mt-2 p-4">
    <div class="embed-responsive embed-responsive-16by9" style="max-height:350px">     
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=@60.4298652,24.7224133&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>       
            </div>
        </div>
    </div>
</div>


@endsection

