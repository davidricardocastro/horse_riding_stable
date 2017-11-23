@extends('/wrapper') @section('content')

<div class="container background_light">


    <div class="row">
        <div class="col-6">

            <h4>Create new slots for ridding lessons</h4>
            <form action="" method="post">
                {{ csrf_field()}}
                <div class="form-group">

                    <label for="description">Description</label>
                    <input class="form-control" type="text" name="description" value="{{ $slot->description }}" required>

                    <label for="n_students">How many riders can attend lesson?</label>
                    <select class="form-control" name="n_students">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                    <label for="start_time">Start time</label>
                    <input class="form-control" type="datetime-local" name="lesson_start" value="{{ $slot->lesson_start }}" required>

                    <label for="finish_time">Finish time</label>
                    <input class="form-control" type="datetime-local" name="lesson_end" value="{{ $slot->lesson_end }}" required>

                    
                    <label for="is_active" hidden>Active lesson</label>
                    <input class="form-control" type="radio" name="available" value="1" checked hidden> Active
                    <input class="form-control" type="radio" name="available" value="0" hidden> No Active
                 


                </div>
                <button class="btn btn-success" type="submit" class="btn btn-primary" value="save">Submit</button>
            </form>




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