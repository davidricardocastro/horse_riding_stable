@extends('wrapper')

@section('content')

<div class="container background_light p-4">
    <h3>Profiilini</h3>
    <h4>{{$user->name}}</h4>
    <p>Reservation could be canceled within 6 hours from the lesson</p>
    <div class="container">
    <!-- GET LIST OF RESERVATIONS + POSSIBILITY TO DELETE -->
    @foreach ($reservations as $reservation)<!--need to include ONLY  USER reservations in the future -->
        <div class="col">
            <p>{{$reservation->description}}</p>
            <p>Lesson Date: {{ date_format(date_create($reservation->lesson_start), "Y/m/d")}}</p>
            <p>Start: {{ date_format(date_create($reservation->lesson_start), "H:i:s")}}<p>
            <p>End: {{ date_format(date_create($reservation->lesson_end), "H:i:s")}}<p>
            <button class="btn-warning" id="cancel_lesson">
            <form method="post" action="{{ action('userController@cancel_reservation', ['id' => $reservation->id])}}">
            {{ csrf_field() }}
            <button id="cancel_reservation" class="btn btn-warning">
            Cancel lesson</button>
            </form>
        </div>
    @endforeach
    </div>

    <!-- GET LIST OF PERSONAL INFORMATION + POSSIBILITY TO EDIT -->
    <h4> Personal Data </h4>
    <!--VIEW-->
    <button class="btn btn-warning" id="edit_personal_data_button">Edit personal data and password</button>
    <button class="btn btn-warning" id="save_personal_data_button">Save</button>

    <div id="view_personal_data">
        <p>{{$user->email}}</p>
        <p>{{$user->phone}}</p>
        <p>{{$user->address}}</p>
    </div>
    <!--EDIT-->
    <div id="edit_personal_data">
        <form method="post">
        {{ csrf_field() }}
            <div class ="form-field">
                <label>Email</label>
                <input value="{{$user->email}}" name="email"><br>
            </div>        
            <div class ="form-field">
                <label>Phone</label>
                <input value="{{$user->phone}}" name="phone"><br>
            </div>
            <div class ="form-field">
                <label>Address</label>
                <input value="{{$user->address}}" name="address"><br>
            </div>
            <div class ="form-field">
                <label>New Password</label>
                <input type="password" name="password"><br>
            </div>
            <div class ="form-field">
                <label>Please repeat new Password</label>
                <input type="password" name="password_repeat"><br>
            </div>
        </form>
    </div>
</div>

<script>
// POPUP CANCEL RESERVATION
$(function(){
    $('#cancel_reservation').click(function(event) {
        if(!confirm('Do you want really to cancel the reservation?')) {
            event.preventDefault();
        }
    });
    $('#edit_personal_data').css('display','none');
    $('#save_personal_data_button').css('display','none');

    $('#edit_personal_data_button').click(function(){
            $('#view_personal_data').css('display','none');
            $('#save_personal_data_button').css('display','inline');
            $('#edit_personal_data').css('display','block');
        });
});
</script>

@endsection


