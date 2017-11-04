@extends('wrapper')


@section('content')

<div class="container">
    <div class="row">
<div class="col-12 pb-2">
<h1>Yhteystiedot</h1>

<h2>Andatino Talli</h2>

<p>Lopentie 6<br>
01860 Nurmijärvi</p>

<p>+358 452 312 398</p>

<p>andantinotalli@gmail.com</p>

</div>
        <div class="col-12">
            <h4>Voit ottaa yhteyttä Andatino Talliin myös oheisella lomakkeella. Täytä yhteystietosi, niin otamme
                yhteyttä!</h4>
        </div>




        <div class="col">


            <form action="" method="post">


            {{ csrf_field()}}  


                <div class="form-group">
                    <label for="Name">Nimi</label>
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

                <button class="btn btn-primary" id: "send_btn" type="submit">
                    Lähetä
                </button>

            </form>

        </div>
    </div>
</div>







@endsection