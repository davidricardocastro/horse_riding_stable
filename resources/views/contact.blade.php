@extends('wrapper')


@section('content')

<div class="container">
    <div class="row">

        <div class="col-12">
            <h3>Voit ottaa yhteyttä Andatino Talliin myös oheisella lomakkeella. Täytä yhteystietosi, niin otamme
                yhteyttä!</h3>
        </div>

        <div class="col">


            <form action="" method="get">

                <div class="form-group">
                    <label for="Name">Nimi</label>
                    <input type="text" class="form-control" id="name" placeholder="">

                </div>

                <div class="form-group">
                    <label for="email">Sähköposti</label>
                    <input type="email" class="form-control" id="email" placeholder="">

                </div>

                <div class="form-group">
                    <label for="phone">Puhelinnumero</label>
                    <input type="int" class="form-control" id="phone" placeholder="">

                </div>



                <div class="form-group">
                    <label for="message">Viesti</label>
                    <textarea class="form-control" id="message" rows="6"></textarea>

                </div>

                <button class="btn btn-primary" id: "send_btn" type="submit">
                    Lähetä
                </button>

            </form>

        </div>
    </div>
</div>







@endsection