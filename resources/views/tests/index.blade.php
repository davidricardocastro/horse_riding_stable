@extends('index')

@section('content')

@foreach($horse_with_m as $horse)

<div class="horse">
    <div class="name">{{ $horse->name}}</div> 
    </div>
    @endforeach
</div>
    @endsection