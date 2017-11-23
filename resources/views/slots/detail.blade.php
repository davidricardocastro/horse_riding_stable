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

      <form class="delete" action="{{ action('slotController@destroy',  ['id' => $slot->id]) }}" method="post">
        {{ csrf_field()}}

        <button id="hiddenBtn" class="d-none btn btn-danger ">Confirm deletion</button>
      </form>
      <button id="hiddenBtn2" class="btn btn-success d-none " onclick="deleteCancel()">Cancel</button>
      <button id="hiddenBtn3" class="btn btn-warning" onclick="deleteConfirm()">delete lesson slot</button>

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
          <a href="{{ action('WeekSlotController@index') }}">Select a week</a>
        </button>

      </div>
    </div>


  </div>

</div>

<script>
  //confirmation before deleting lesson slot. 
  function deleteConfirm() {
    document.getElementById("hiddenBtn").classList.remove('d-none');
    document.getElementById("hiddenBtn2").classList.remove('d-none');
    document.getElementById("hiddenBtn3").classList.add('d-none');

  }

  function deleteCancel() {
    document.getElementById("hiddenBtn").classList.add('d-none');
    document.getElementById("hiddenBtn2").classList.add('d-none');
    document.getElementById("hiddenBtn3").classList.remove('d-none');
  }

</script> @endsection