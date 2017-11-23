@extends('/wrapper') @section('content')
<div class="container background_light">
    <div class="row">
        <div class="col-6 mt-5">

            <h3 class="list-group-item active">Select a different date </h3>
            <!-- selection of a new date-->
            <form  method="post">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="date" name="date" id="newdate">
                </div>

                <div class="form-group">
                    <button class="btn btn-outline-success" type="submit" onclick="updateForm(this); return false">Submit</button>
                </div>
                <Script>
                    function updateForm(button) {
                        //console.log(button.form);
                        var targetDate = document.getElementById('newdate').value;
                        window.location.href = './day/' + targetDate;
                    }
                    


                </Script>
            </form>
        </div>


        <div class="col-12 my-5 ">

            <div class="btn-group">
                <button type="button" class="btn btn-outline-success">
                    <a href="{{ action('slotController@create') }}">New lesson</a>
                </button>
                <button type="button" class="btn btn-outline-success">
                    <a href="{{ action('slotController@listing') }}">All lessons</a>
                </button>
                <button type="button" class="btn btn-outline-success">
                    <a href="{{ action('DaySlotController@index') }}">Select a day</a>
                </button>


            </div>
        </div>
    </div>
</div>
@endsection