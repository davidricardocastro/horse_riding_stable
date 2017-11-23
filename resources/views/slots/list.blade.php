@extends('/wrapper') @section('content')

<div class="container background_light">
    <div class="row">
        <div class="col-12 mt-5">
            <ul class="list-group" id="slotlist">

                <h3 class="list-group-item active">All lessons</h3>

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
                    <!--begins({{$slot->lesson_start}}) ends({{$slot->lesson_end}}) number of riders({{$slot->n_students}})
                    -->

                </li>
                @endforeach


            </ul>
        </div>
       

        <div class="col-12 my-5 ">

            <div class="btn-group" >
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
                    <a href="{{ action('WeekSlotController@index') }}">Select a week</a>
                </button>

            </div>
        </div>

    </div>
</div>
@endsection