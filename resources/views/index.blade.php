@extends('wrapper')

@section('content')

<div class="container background_light">
    <h1>Talli</h1>
    <h2>This page is under development</h2>
</div>
<div class="container background_light p-4">
    <img class="img-fluid" src="{{url ('/img/horse5_cut.jpg') }}" alt="horse">
</div>
<div class="container background_light mt-2 p-4">
    <div class="embed-responsive embed-responsive-16by9" style="max-height:350px">     
    <div class="mapouter"><div class="gmap_canvas">
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=@60.4298652,24.7224133&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>       
    </div></div>
    </div>
</div>


@endsection

