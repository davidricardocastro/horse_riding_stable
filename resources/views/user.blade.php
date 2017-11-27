 @extends('wrapper') @section('content')


<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style_booking.css') }}">



    <div class="container background_light">
        <div class="row">
            <div class="col-12">
                <h3>Welcome {{ $user_name }}</h3>
                <p class="legend">Please select a date:</p>
                <div class="hope"></div>
            </div>
            <div class="col-12">
                <div id="datepicker"></div>
            </div>
            <div class="col-12">
                <div id="accordion">
                    <h3>Current Selection</h3>
                    <table class="table" id="table_mobile" style="width:100%">

                    </table>
                </div>
            </div>
            <!-- Here used to be a lot of rows -->
            <div class="col">
                <div id="confirm_buttons" style="display:block;" class="confirm">
                    <button type="submit" id="confirm" class="btn btn-primary">Confirm</button>
                    <button type="submit" id="reset" class="btn btn-alert">Reset</button>
                </div>
                <div id="booking_confirmation" title="Booking Confirmation">
                    <div id="add_spots"></div>
                        <button id="add_spot_counter">
                            <i class="fa fa-plus-circle" aria-hidden="true"> add +1 person</i>
                        </button><br>
                    <button id="remove_spot_counter">
                        <i class="fa fa-plus-circle" aria-hidden="true"> remove -1 person</i>
                    </button><br>
                        <button type="submit" id="accept" class="btn btn-primary">Accept</button>
                        <button type="submit" id="cancel" class="btn btn-primary">Cancel</button>
                </div>
                <div id="booking_sent" title="Booking Sent">
                    <p>Thank you for your reservation. You will receive an email with the details of your lesson</p>
                    <button type="submit" id="back" class="btn btn-primary">Continue</button>
                </div>
            </div>
        </div>
        <div class="legend">Instructions: Please click to book a lesson. Shortly your request will be confirmed by the trainer.
            <ul>
                <div style="width:10px;height:10px;background:lightgreen;"></div>Green: available
                <br>
                <div style="width:10px;height:10px;background:#007fff;"></div>Blue: current selection
                <br>
                <div style="width:10px;height:10px;background:darkslategrey;"></div>Grey: unavailable
                <br>
            </ul>
        </div>
    </div>

    @can('admin')
    <!-- This style hides the user's datepicker,confirm_buttons-->
    <style>
        div#datepicker {            display: none;        }
        div#confirm_buttons {            display: none;        }
        button#confirm {            display: none;        }
        button#reset {            display: none;        }
        div#booking_confirmation {            display: none;        }
        div#booking_sent {            display: none;        }
        div#accordion {            display: none;        }
        div.legend {            display: none;        }
        p.legend {            display: none;        }
    </style>
    <div class="container background_light">
        <div class="row">
            <div class="col py-3">

                <!-- Links for creting new lessons slots-->
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-success">
                        <a href="{{ action('slotController@create') }}">Create New lesson</a></button>
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


                <!--Table for displaying all users info -->
                <div class="week-picker"></div>
                <label>Week :</label>
                <span id="startDate"></span> -
                <span id="endDate"></span>
                <h3>Administrator's Master Menu</h3>
                <table class="table table-responsive" id="table_desktop">
                    <tr id="0">
                        <th class="slot_title">Time_Slot</th>
                        <th id="day0" class="weekday day1"></th>
                        <th id="day1" class="weekday day2"></th>
                        <th id="day2" class="weekday day3"></th>
                        <th id="day3" class="weekday day4"></th>
                        <th id="day4" class="weekday day5"></th>
                        <th id="day5" class="weekday day6"></th>
                        <th id="day6" class="weekday day7"></th>
                    </tr>
                </table>
            </div>
            <div class="newDiv"></div>

        </div>
    

    <div class="row">
        <div class="col-12">
            <h5>Users details:</h5>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_table as $user)
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['phone']}}</td>
                        <td>{{$user['address']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>Slot details:</h5>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>n_students</th>
                        <th>lesson_start</th>
                        <th>level</th>
                        <th>max_reservations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slot_table as $slot)
                    <tr>
                        <th scope="row">{{$slot['id']}}</th>
                        <td>{{$slot['n_students']}}</td>
                        <td>{{$slot['lesson_start']}}</td>
                        <td>{{$slot['lesson_end']}}</td>
                        <td>{{$slot['available']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>Reservation details:</h5>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>user_id</th>
                        <th>slot_id</th>
                        <th>n_of_spots</th>
                        <th>created_at</th>
                        <th>updated_at</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservation_table as $reservation)
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$reservation['user_id']}}</td>
                        <td>{{$reservation['slot_id']}}</td>
                        <td>{{$reservation['n_of_spots']}}</td>
                        <td>{{$reservation['created_at']}}</td>
                        <td>{{$reservation['updated_at']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    @endcan

@endsection @section('scripts')

    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/booking.min.js')}}"></script>
 @endsection