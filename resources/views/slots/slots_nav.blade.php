@yield('slots')

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