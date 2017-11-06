@extends('wrapper')

@section('content')

<div class="container background_light">
    <h1>Talli</h1>
</div>
<div class="container background_light">
    <img class="img-fluid p-3" src="{{url ('/img/horse5_cut.jpg') }}" alt="horse">
</div>
<div class="container background_light mt-2 p-3">
    <div class="embed-responsive embed-responsive-16by9" style="max-height:350px">     
    <div class="mapouter"><div class="gmap_canvas">
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Lopentie 6, 01860 Nurmijärvi, Finland&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>       
    </div></div>
    </div>
</div>


@endsection

