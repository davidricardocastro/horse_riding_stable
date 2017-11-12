@extends('wrapper')


@section('content')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="container background_light p-4">
    <div class="row">
<div class="col-12 pb-2">
<h2>Yhteystiedot</h2>



<p class="m-0">&#x1F3E0

Lopentie 6, 
01860 Nurmijärvi</p>
<p class="m-0">&#x1F4DE +358 452 312 398</p>
<p class="m-0">&#x1F4E7 stallgranbacka@gmail.com</p>


</div>



        <div class="col-12 mt-3">
            <p>Voit ottaa yhteyttä Andatino Talliin myös oheisella lomakkeella.<br> Täytä yhteystietosi, niin otamme
                yhteyttä!</p>
        </div>


        <div class="col col-md-8 col-lg-6">
            <form action="" method="post">
            {{ csrf_field()}}
                <div class="form-group">
                    <label for="name">Nimi</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="email">Sähköposti</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="phone">Puhelinnumero</label>
                    <input type="int" class="form-control" name="phone" id="phone" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="message">Viesti</label>
                    <textarea class="form-control" id="message" rows="6" value=""  name="message"></textarea>
                </div>
                <div class="form-group g-recaptcha" data-sitekey="6LcdIDgUAAAAAPi04wbQkq_u791O3gvjodZGEwRK"></div>
                <button class="btn btn-primary" id="send_btn" type="submit">
                    Lähetä
                </button>
            </form>
        </div>
    </div>
</div>

@endsection