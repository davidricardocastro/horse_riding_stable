@extends('wrapper')


@section('seoMeta')
    <link rel="canonical" href="https://www.andantino.fi/hevoset/">
    <meta name="description" content="Tarjoamme ratsastustunteja 1-4 hengen ryhmissä tiistaista lauantaihin, myös aamuisin ja aamupäivisin. Perttula, Nurmijärvi"/>
    <meta name="title" content="Talli Andantino - Ratsastustunnit 1-4 hengen ryhmissä - Perttula, Nurmijärvi">
@endsection


@section('content')

<div class="container background_light p-4">
    <div class="row justify-content-around">
        <div class="col-12">
            <h1>Hevoset</h1>
        </div>
      
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Antonya</h4>
                    <img class="card-img-top" src="./img/horse3_low.jpg" alt="horse image">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
       
      
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Daniel</h4>
                    <img class="card-img-top" src="./img/horse4_low.png" alt="horse image">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
     
       
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Roky</h4>
                    <img class="card-img-top" src="./img/horse1_low.jpg" alt="horse image">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
      
    
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body ">
                    <h4 class="card-title">Verdi</h4>
                    <img class="card-img-top" src="./img/horse2_low.jpg" alt="horse image">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>
            
            <div class="card m-3 text-center bg-light" style="width: 20rem;">
                <div class="card-body ">
                    <h4 class="card-title">Lily</h4>
                    <img class="card-img-top" src="./img/lily.jpeg" alt="horse image">
                    <p class="card-text"><!-- info about horse here--></p>
                </div>
            </div>

             
    </div>
</div>

@endsection