@extends('/wrapper') @section('content')

<div class="container background_light">

    <div class="col-6 mt-5">
        <ul class="list-group" id="slotlist">

            <li class="list-group-item active">Slots</li>

            @foreach($slots as $slot)
            <li class="list-group-item">

                <a href="{{route('slot detail', ['id'=> $slot->id])}}">{{$slot->description}}</a>
                begins({{$slot->lesson_start}})
                ends({{$slot->lesson_end}})
                number of riders({{$slot->n_students}})


            </li>
            @endforeach


        </ul>
    </div>


</div>
@endsection