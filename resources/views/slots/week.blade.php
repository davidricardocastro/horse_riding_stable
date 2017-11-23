@extends('/wrapper') @section('content')

<div class="container background_light">
    <div class="row">
        <div class="col-12 mt-5">

            <h3 class="list-group-item active">Select a different date </h3>
            <!-- selection of a new date-->
            <form method="post">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="date" name="date" id="newdate">
                </div>

                <div class="form-group">
                    <button class="btn btn-outline-success" type="submit" onclick="updateForm(this); return false">Submit</button>
                </div>
                <Script>
                    function updateForm(button) {
                        var targetDate = document.getElementById('newdate').value;
                        window.location.href = './' + targetDate;
                    }
                </Script>
            </form>
        </div>

        <div class="col-12 mt-5">
            <ul class="list-group" id="slotlist">

                <h3 class="list-group-item active">Showing lessons for 7 days from {{$lesson_start}} </h3>

                @foreach($slots as $slot)
                <li class="list-group-item">

                    <a href="{{route('slot detail', ['id'=> $slot->id])}}">{{$slot->description}}</a>
                    <table class="table">
                        <thead>
                            <th>
                                Start
                            </th>
                            <th>
                                End
                            </th>
                            <th>
                                Number of riders
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$slot->lesson_start}}</td>
                                <td>{{$slot->lesson_end}}</td>
                                <td>{{$slot->n_students}}</td>
                            </tr>
                        </tbody>
                    </table>

                </li>
                @endforeach


            </ul>
            <div class="mt-5">

                <!-- Copy lessons to a new date-->
                <h3 class="list-group-item active">Copy same lessons to a different day </h3>
                <form action="" method="get">
                    <label for="newdate">Select day</label>

                    <div class="form-group">
                        <input type="date" name="newdate" value="" id="">
                    </div>

                    <button class="btn btn-outline-success">Copy</button>
                </form>



            </div>
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
                <button type="button" class="btn btn-outline-success">
                    <a href="#">Select a week</a>
                </button>
                <button type="button" class="btn btn-outline-success">
                    <a href="{{ action('WeekSlotController@index') }}">Select a week</a>
                </button>

            </div>
        </div>


    </div>
</div>
@endsection