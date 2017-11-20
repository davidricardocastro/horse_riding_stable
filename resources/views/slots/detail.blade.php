@extends('/wrapper') @section('content')

<div class="container background_light">
  <div class="row">
    <div class="col-7 mt-5">



      <ul class="list-group">
        <li class="list-group-item active">Description: {{$slot->description}}</li>
        <li class="list-group-item">Number of riders: {{$slot->n_students}}</li>
        <li class="list-group-item">Start time: {{$slot->lesson_start}}</li>
        <li class="list-group-item">Finish time: {{$slot->lesson_end}}</li>
        <li class="list-group-item">Available: {{$slot->available}}</li>
      </ul>






      <a href="{{ action('slotController@edit', ['id' => $slot->id])}}" class="btn btn-primary">Edit slot</a>


    </div>
    <div class="col-2 mt-5">
      <button class="btn btn-outline-success">
          <a href="{{ action('slotController@listing') }}">List of slots</a>
      </button>
  </div>
  <div class="col-2 mt-5">
    <button class="btn btn-outline-success">
        <a href="{{ action('slotController@create') }}">New slot</a>
    </button>
</div>
  </div>

</div>
@endsection