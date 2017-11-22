@extends('wrapper')

@section('content')

<div class="container background_light p-4">
    <h3>Profiilini</h3>
    <h4>{{$user->name}}</h4>
    <p>Varaus voidaan peruuttaa 6 tunnin kuluessa oppitunnista</p>
    <div class="ml-3">
    <!-- GET LIST OF RESERVATIONS + POSSIBILITY TO DELETE -->
    @foreach ($reservations as $reservation)<!--need to include ONLY  USER reservations in the future -->
        <div class="col" style="max-width: 350px">   
            <h5>Päivämäärä: {{ date_format(date_create($reservation->lesson_start), "d M y")}}</h5>
            <p class="m-0">{{ $reservation->slot_description }}</p>
            <p class="m-0">Aika: {{ date_format(date_create($reservation->lesson_start), "H:i")}} - {{ date_format(date_create($reservation->lesson_end), "H:i")}}</p>
            <p class="m-0"><strong>Varattu</strong></p>
        </div>
        <div class="col">
            <form method="post" action="{{ action('userController@cancel_reservation', ['id' => $reservation->id])}}">
            {{ csrf_field() }}
            <button id="cancel_reservation" class="btn btn-secondary m-2">
            Peruuta oppitunti</button>
            </form>
        </div>
        
    @endforeach
    </div>
</div>

<div class="container background_light p-4">
    <!-- GET LIST OF PERSONAL INFORMATION + POSSIBILITY TO EDIT -->
    <h4>Henkilökohtaiset Tiedot</h4>
    <!--VIEW-->
    <div class="col">
    <button class="btn btn-success ml-4 mb-2" id="edit_personal_data_button" style="white-space:normal;">Muokkaa Henkilötietoja ja Salasanaa</button>
    <button class="btn btn-success ml-2 mb-2" id="save_personal_data_button" style="display:none;">Tallentaa</button>

    <div id="view_personal_data" class="col mt-2">
        <p class="m-0">Sähköposti: {{$user->email}}</p>
        <p class="m-0">Puhelinnumero: {{$user->phone}}</p>
        <p class="m-0">Osoite: {{$user->address}}</p>
    </div>
    <!--EDIT-->
    <div id="edit_personal_data" class="col mt-2" style="display:none;">
        <form method="post">
        {{ csrf_field() }}
            <div class ="form-field">
                <label style="width:250px">Sähköposti: </label>
                <input value="{{$user->email}}" type="email" name="email"><br>
            </div>        
            <div class ="form-field">
                <label style="width:250px">Puhelinnumero: </label>
                <input value="{{$user->phone}}" name="phone"><br>
            </div>
            <div class ="form-field">
                <label style="width:250px">Osoite: </label>
                <input value="{{$user->address}}" name="address"><br>
            </div>
            <div class ="form-field">
                <label style="width:250px">Uusi Salasana: </label>
                <input type="password" name="password"><br>
            </div>
            <div class ="form-field">
                <label style="width:250px">Toista uusi salasana: </label>
                <input type="password" name="password_repeat"><br>
            </div>
        </form>
    </div>
</div>
</div>

<script>
// POPUP CANCEL RESERVATION

$(function(){
    $('#cancel_reservation').click(function(event) {
        if(!confirm('Haluatko todella peruuttaa varauksen?')) {
            event.preventDefault();
        }
    });

    $('#edit_personal_data_button').click(function(){
            $('#view_personal_data').css('display','none');
            $('#save_personal_data_button').css('display','inline');
            $('#edit_personal_data').css('display','block');
        });

    $('#save_personal_data_button').click(function(event) {
        if(!confirm('Haluatko todella muuttaa henkilötietojasi?')) {
            event.preventDefault();
        }
    });
});
</script>

@endsection


