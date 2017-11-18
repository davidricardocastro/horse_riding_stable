@extends('/wrapper')

@section('content')

<div class="container background_light">

<div class="col mt-5">


<?php
//retrieves data from authors table
//$author=App\Author::find($book->author_id);



?>

<ul class="list-group">
  <li class="list-group-item active">Description: {{$slot->description}}</li>  
  <li class="list-group-item">Number of riders: {{$slot->n_students}}</li>
  <li class="list-group-item">Start time: {{$slot->lesson_start}}</li>
  <li class="list-group-item">Finish time: {{$slot->lesson_end}}</li>
  <li class="list-group-item">Available: {{$slot->available}}</li>
</ul>




  

<a href="{{ action('slotController@edit', ['id' => $slot->id])}}" class="btn btn-primary">Edit slot</a>


</div>


</div>
@endsection