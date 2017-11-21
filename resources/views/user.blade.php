
@extends('wrapper')

@section('content')


    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_booking.css') }}">



    <div class="container background_light">
        <div class="row">
            <div class="col-12">
                <h3>Welcome {{ $user_name }}</h3>
                <p>Please select a date:</p>
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
                    <i class="fa fa-plus-circle" aria-hidden="true">add one person more</i>
                    <button type="submit" id="accept" class="btn btn-primary">Accept</button>
                    <button type="submit" id="cancel" class="btn btn-primary">Cancel</button>
                </div>

                <div id="booking_sent" title="Booking Sent">
                    <p>Thank you for your reservation. You will receive an email with the details of your lesson</p>
                    <button type="submit" id="back" class="btn btn-primary">Continue</button>
                </div>
            </div>
            <div class="legend">Instructions: Please click to book a lesson. Shortly your request will be confirmed by the trainer.
                <ul>
                    <div style="width:10px;height:10px;background:lightgreen;"></div>Green:  available<br>
                    <div style="width:10px;height:10px;background:#007fff;"></div>Blue:  current selection<br>
                    <div style="width:10px;height:10px;background:darkslategrey;"></div>Grey:  unavailable<br>
                </ul>
            </div>
        </div>

        @can('admin')
<!-- This style hides the user's datepicker,confirm_buttons-->
            <style>
                div#datepicker{ display:none;}
                div#confirm_buttons{ display:none;}
                button#confirm{ display:none;}
                button#reset{ display:none;}
                div#booking_confirmation{ display:none;}
                div#booking_sent{ display:none;}
                div#accordion{display:none;}
            </style>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="week-picker"></div>
                    <label>Week :</label> <span id="startDate"></span> - <span id="endDate"></span>
                    <h3>Administrator's Master Menu</h3>
                    <table class="table table-responsive" id="table_desktop">
                        <tr  id="0">
                            <th class="slot_title">Time_Slot</th>
                            <th id="day0" class="weekday day1"></th>
                            <th id="day1" class="weekday day2"></th>
                            <th id="day2" class="weekday day3"></th>
                            <th id="day3" class="weekday day4"></th>
                            <th id="day4" class="weekday day5"></th>
                            <th id="day5" class="weekday day6"></th>
                            <th id="day6" class="weekday day7"></th>
                        </tr>
                        <tr  id="1">
                            <td id="0" class="slot_data">08:00 - 09:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="2">
                            <td id="0" class="slot_data">09:00 - 10:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="3">
                            <td id="0" class="slot_data">10:00 - 11:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="4">
                            <td id="0" class="slot_data">11:00 - 12:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr id="5">
                            <td id="0" class="slot_data">12:00 - 13:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="6">
                            <td id="0" class="slot_data">13:00 - 14:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="7">
                            <td id="0" class="slot_data">14:00 - 15:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>

                        <tr  id="8">
                            <td id="0" class="slot_data">15:00 - 16:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="9">
                            <td id="0" class="slot_data">16:00 - 17:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr id="10">
                            <td id="0" class="slot_data">17:00 - 18:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="11">
                            <td id="0" class="slot_data">18:00 - 19:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                        <tr  id="12">
                            <td id="0" class="slot_data">19:00 - 20:00</td>
                            <td id="1" class="slot unchecked" data-class="unchecked"></td>
                            <td id="2" class="slot unchecked" data-class="unchecked"></td>
                            <td id="3" class="slot unchecked" data-class="unchecked"></td>
                            <td id="4" class="slot unchecked" data-class="unchecked"></td>
                            <td id="5" class="slot unchecked" data-class="unchecked"></td>
                            <td id="6" class="slot unchecked" data-class="unchecked"></td>
                            <td id="7" class="slot unchecked" data-class="unchecked"></td>
                        </tr>
                    </table>
                </div>
            <div class="newDiv"></div>

        </div>
    </div>
<!--Table for displaying all users info -->
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
                        <th>user_name</th>
                        <th>slot_detail</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reservation_table as $reservation)
                        <tr>
                            <th scope="row">{{$user['id']}}</th>
                            <td>{{$reservation['user_name']}}</td>
                            <td>{{$reservation['slot_detail']}}</td>
                            <td>{{$reservation['slot_detail']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endcan
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script>
        var select_date = "";
        var time_slot = "";
        var selected_slot_id = null;
        var lesson_start_range = "";
        var lesson_end_range = "";
        var lesson_hour_range = "";

    $(function(){
        initialize();
    });
            function initialize() {
                        $("#confirm_buttons").css('display','none');//not display until the user clicks in a slot
                        $("#booking_confirmation").css('display','none');//not display until the user clicks in a slot
                        $("#booking_sent").css('display','none');//not display until the user clicks in a slot
                        $("#accordion").css('display','none');//not display until the user clicks in a slot

                        //displays the datepicker
                        $("#datepicker").datepicker({
                            onSelect:function(date,inst){
                                select_date = date;//11/16/2017
                                console.log(select_date);

                                //here create an API end point that will receive the date and retrieve

                                $.ajax(
                                    {
                                        method : 'get',
                                        url: '{{ action('Api\ReservationController@display_reservation')}}',
                                        data: {
                                            date: select_date,// 11/16/2017

                                        },
                                        success: function(data){

                                            //console.log(data[0]['description']);//Gives 2 : amount of rows from DB

                                            $('#table_mobile').empty();//removes the childs and the text inside to our tr,td'S
                                                $.each(data, function(i, slot) {

                                                    //ELEMENT one_tr CREATED this is the rows with the time and detailed info of lesson
                                                    var one_tr = $('<tr>\
                                                    <td class="slot_data">\
                                                    </td>\
                                                    <td class="slot unchecked">\
                                                    </td>\
                                                    </tr>');

                                                    //Makes a description of what the user will see of a lesson like: Beginners , N of Students =1
                                                    var slot_full_description = slot.description+'<br> N of Students ='+slot.n_students;
                                                    one_tr.find('.slot').html(slot_full_description);

                                                    var lesson_start_range = slot.lesson_start.slice(10,16);//2017-11-15 16:00:00->16:00
                                                    var lesson_end_range = slot.lesson_end.slice(10,16);//17:00
                                                    var lesson_hour_range = lesson_start_range+' - '+lesson_end_range;

                                                    one_tr.find('.slot_data').html(lesson_hour_range);//16:00 - 17:00

                                                    //add a data attribute id="1" slot.id comes from the DB
                                                    one_tr.data('id',slot.id);

                                                    // when the element is done, append it to the container
                                                    $('#table_mobile').append(one_tr);

                                                        one_tr.click(function(ev){
                                                            //the this is the TR clicked
                                                            selected_slot_id = $(this).data('id');
                                                            console.log(selected_slot_id);
                                                        });
                                                    });
                                            activateSlots();
                                        }//ENDS ON SUCCESS
                                    });//ends AJAX Request

                                $("#accordion").css('display','block');

                            }
                        });//ends the date picker

                        $("#accordion").accordion({
                            collapsible: true,
                            heightStyle: "content"
                        });



                    }


            function activateSlots(){

                    //Slot time management and display in the table below the week
                    $('.slot').click(function(){

                        $("#confirm_buttons").css('display','block');


                    });

            }

        //Button actions for the overlay
                $('#confirm').on('click', function(){
                    $( "#booking_confirmation" ).dialog();//behavior of the dialog box
                    $( "#add_spots" ).text("add"+select_date+"spots to your reservation");

                });

                $('#reset').on('click', function(){
                    initialize();

                });
                $('#accept').on('click', function(){
                    //ajax request
                    $.ajax({
                        method : 'post',
                        url: '{{ action('Api\ReservationController@create_reservation') }}',
                        data: {
                            id: selected_slot_id,
                            user_id:{{ $user_id }}
                            n_spo
                        },
                        success: function(data){
                        }
                    });
                    $( "#booking_confirmation" ).dialog("close");
                    $( "#booking_sent" ).dialog();
                });

                $('#cancel').on('click', function(){
                    $("#booking_confirmation").dialog("close");
                });

                $('#back').on('click', function(){
                    $( "#booking_sent" ).dialog("close");
                    $( "#booking_confirmation" ).dialog("close");
                    $("#accordion").css('display','none');
                    $("#confirm_buttons").css('display','none');
                });


    </script>
    
    <script type="text/javascript">
    // Week picker DEPRECATED ********************************************************************************
    $(function() {
        var startDate;
        var endDate;
        
        var selectCurrentWeek = function() {
            window.setTimeout(function () {
                $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
            }, 1);
        }
        
        $('.week-picker').datepicker( {
            showOtherMonths: true,
            selectOtherMonths: true,
            onSelect: function(dateText, inst) { 
                var date = $(this).datepicker('getDate');
                startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
                endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
                var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
                $('#startDate').text($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
                $('#endDate').text($.datepicker.formatDate( dateFormat, endDate, inst.settings ));

                for (var i=0; i <=6; i++)  {
                    datex = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay()+ i);
                    $('#day'+i).text($.datepicker.formatDate('D, dd-mm-yy', datex,inst.settings));
                }
                var header_day = $('th#day0').text();
                console.log(header_day);
                selectCurrentWeek();
            },
            beforeShowDay: function(date) {
                var cssClass = '';
                if(date >= startDate && date <= endDate)
                    cssClass = 'ui-datepicker-current-day';
                return [true, cssClass];
            },
            onChangeMonthYear: function(year, month, inst) {
                selectCurrentWeek();
            }
        });

    });
    </script>

@endsection
