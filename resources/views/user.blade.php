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
    <script>
        var select_date = "";
        var selected_slot_id = null;
        var n_of_spots = 3;
        var n_students = 1;
        var available_spots = 1;

    $(function () {
        initialize();
    });
    function initialize() {
        $("#confirm_buttons").css('display', 'none');//not display until the user clicks in a slot
        $("#booking_confirmation").css('display', 'none');//not display until the user clicks in a slot
        $("#booking_sent").css('display', 'none');//not display until the user clicks in a slot
        $("#accordion").css('display', 'none');//not display until the user clicks in a slot
        console.log("stuff is hidden");
        //displays the datepicker
        $("#datepicker").datepicker({
            onSelect: function (date, inst) {
                select_date = date;//11/16/2017
                    $.ajax(
                        {
                            method: 'get',
                            url: '{{ action('Api\ReservationController@display_reservation')}}',
                            data: {
                            date: select_date// 11/16/2017
                            },
                                success: function (data) {
                                console.log(data);
                            $('#table_mobile').empty();//removes the childs and the text inside to our tr,td'S
                            $.each(data, function (i, slot) {

                                        //ELEMENT one_tr CREATED this is the rows with the time and detailed info of lesson
                                        var one_tr = $('<tr>\
                                                        <td class="slot_data">\
                                                        </td>\
                                                        <td class="slot unchecked">\
                                                        </td>\
                                                        </tr>');

                                            //Makes a description of what the user will see of a lesson like: Beginners , N of Students =1
                                            if (slot.n_students>0){
                                            var slot_full_description = 'Class: '+slot.description + '<br>Available spots = ' + slot.n_students;
                                            one_tr.find('.slot').html(slot_full_description);

                                            //to be used later for the reservation check if higher than available slots
                                            //var n_student = slot.n_students;


                                            var lesson_start_range = slot.lesson_start.slice(10, 16);//2017-11-15 16:00:00->16:00
                                            var lesson_end_range = slot.lesson_end.slice(10, 16);//17:00
                                            var lesson_hour_range = lesson_start_range + ' - ' + lesson_end_range;

                                            one_tr.find('.slot_data').html(lesson_hour_range);//16:00 - 17:00

                                            //add a data attribute id="1" slot.id comes from the DB
                                            one_tr.data('id', slot.id);
                                            one_tr.data('n_students', slot.n_students);
                                            // when the element is done, append it to the container
                                            $('#table_mobile').append(one_tr);

                                            one_tr.click(function (ev) {

                                                selected_slot_id = $(this).data('id');
                                                n_students = $(this).data('n_students');
                                                $(this).css("color", "blue").css("font-weight","bold");
                                                    //console.log(n_students);

                                            });
                                            }
                                        });
                                        activateSlots();
                                    }//ENDS ON SUCCESS

                            });//ends AJAX Request

                                $("#accordion").css('display', 'block');

                                    },
            beforeShowDay: function(date) {
                var yesterday = new Date();
                yesterday.setDate(yesterday.getDate()-1);
                return [date.getTime() > yesterday.getTime()];
            }
                                });//ends the date picker

                        $("#accordion").accordion({
                            collapsible: true,
                            heightStyle: "content"
                        });
        }

    function activateSlots() {
        $('.slot').click(function () {
            $("#confirm_buttons").css('display', 'block');
            n_of_spots = 1;
        });
    }

        //Actions for the dialog boxes: first is confirm second is accept.
        $('#confirm').on('click', function(){
            $( "#booking_confirmation" ).dialog();//behavior of the dialog box
                confirmCheck();
        });

        $('#add_spot_counter').on('click', function() {
            n_of_spots++;
            confirmCheck();
        });

        $('#remove_spot_counter').on('click', function() {
            n_of_spots--;
            confirmCheck();
        });

        function confirmCheck() {
            available_spots = n_students - n_of_spots;
            if(n_of_spots > 1 )
            {
                $('#remove_spot_counter').show();
            }
            else {
                $('#remove_spot_counter').hide();
            }
                    if (n_students > n_of_spots){
                        $('#add_spot_counter').show();
                        displaySlotCount();
                    }
                    else {
                        displaySlotMax();
                        $('#add_spot_counter').hide();
                    }
        }

        function displaySlotCount() {

            $( "#add_spots" ).text("You have reserved for "+n_of_spots+" student(s). You can add up to "+available_spots+" more");
            //here add the button with the event onclick that will increase the counter until it reaches the limit of slots
        }
        function displaySlotMax() {
            $( "#add_spots" ).text(n_students+" is the maximum spots for this reservation");
        }


        $('#reset').on('click', function(){
            initialize();
        });

        $('#accept').on('click', function(){
                $.ajax({
                    method : 'post',
                    url: '{{ action('Api\ReservationController@create_reservation') }}',
                    data: {
                        id: selected_slot_id,
                        user_id: {{ $user_id }},
                        n_of_spots: n_of_spots,
                        n_students: n_students
                        },
                            success: function (data) {
                            }
                });
                    $("#booking_confirmation").dialog("close");
                    $("#booking_sent").dialog();
        });

    $('#cancel').on('click', function () {
        $("#booking_confirmation").dialog("close");
    });

        $('#back').on('click', function(){
            $( "#booking_sent" ).dialog("close");
            $( "#booking_confirmation" ).dialog("close");
            $("#accordion").css('display','none');
            $("#confirm_buttons").css('display','none');
            initialize();
        });


</script>

<script type="text/javascript">
    // Week picker DEPRECATED ********************************************************************************
    $(function () {
        var startDate;
        var endDate;

        var selectCurrentWeek = function () {
            window.setTimeout(function () {
                $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
            }, 1);
        }

        $('.week-picker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            onSelect: function (dateText, inst) {
                var date = $(this).datepicker('getDate');
                startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
                endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
                var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
                $('#startDate').text($.datepicker.formatDate(dateFormat, startDate, inst.settings));
                $('#endDate').text($.datepicker.formatDate(dateFormat, endDate, inst.settings));

                for (var i = 0; i <= 6; i++) {
                    datex = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + i);
                    $('#day' + i).text($.datepicker.formatDate('D, dd-mm-yy', datex, inst.settings));
                }
                var header_day = $('th#day0').text();
                console.log(header_day);
                selectCurrentWeek();
            },
            beforeShowDay: function (date) {
                var cssClass = '';
                if (date >= startDate && date <= endDate)
                    cssClass = 'ui-datepicker-current-day';
                return [true, cssClass];
            },
            onChangeMonthYear: function (year, month, inst) {
                selectCurrentWeek();
            }
        });

    });
</script> @endsection