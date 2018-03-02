@extends('wrapper') @section('content')

<div class="container background_light p-4">
    <div class="row justify-content-around">
        <div class="col-12">
            <h1>Hevoset</h1>
        </div>
      
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Antonya</h4>
                    <img class="card-img-top" src="./img/horse3_low.jpg" alt="horse">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
       
      
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Daniel</h4>
                    <img class="card-img-top" src="./img/horse4_low.png" alt="horse">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
     
       
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Roky</h4>
                    <img class="card-img-top" src="./img/horse1_low.jpg" alt="horse">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
      
    
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body ">
                    <h4 class="card-title">Verdi</h4>
                    <img class="card-img-top" src="./img/horse2_low.jpg" alt="horse">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
      
    </div>
</div>

@endsection