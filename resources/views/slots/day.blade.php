@extends('/wrapper') @section('content')
<div class="container background_light">
    <div class="row">
        <div class="col-6 mt-5">
            <ul class="list-group" id="slotlist">

                <h3 class="list-group-item active">Lessons for {{$lesson_start}} </h3>

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
        </div>
        <div class="col-6">
            <button class="btn btn-outline-success">
                <a href="{{ action('slotController@create') }}">New slot</a>
            </button>
        </div>
    </div>
</div>
@endsection