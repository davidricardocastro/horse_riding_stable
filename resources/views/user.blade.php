
@extends('wrapper')

@section('content')


    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_booking.css') }}">
    <div class="container background_light">
        <div class="row">
       
        <div class="col-6 forms my-5">
        
        </div>
            <div class="col-12">
                <h3>Welcome {{ $user_name }}</h3>
                <p>Please select a date:</p>
            </div>
                <div class="col-12">
                    <div id="datepicker"></div>
                </div>
                    <div class="col-12">
                        <div id="accordion">
                            <h3 class="weekday day1">Please select a time</h3>
                            <table class="table" id="table_mobile" style="width:100%">
                                <tr id="1">
                                    <td id="0" class="slot_data">08:00 - 09:00</td>
                                    <td id="08:00 - 09:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="2">
                                    <td id="0" class="slot_data">09:00 - 10:00</td>
                                    <td id="09:00 - 10:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="3">
                                    <td id="0" class="slot_data">10:00 - 11:00</td>
                                    <td id="10:00 - 11:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="4">
                                    <td id="0" class="slot_data">11:00 - 12:00</td>
                                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="5">
                                    <td id="0" class="slot_data">12:00 - 13:00</td>
                                    <td id="11:00 - 12:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="6">
                                    <td id="0" class="slot_data">13:00 - 14:00</td>
                                    <td id="13:00 - 14:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="7">
                                    <td id="0" class="slot_data">14:00 - 15:00</td>
                                    <td id="14:00 - 15:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="8">
                                    <td id="0" class="slot_data">15:00 - 16:00</td>
                                    <td id="15:00 - 16:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="9">
                                    <td id="0" class="slot_data">16:00 - 17:00</td>
                                    <td id="16:00 - 17:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="10">
                                    <td id="0" class="slot_data">17:00 - 18:00</td>
                                    <td id="17:00 - 18:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="11">
                                    <td id="0" class="slot_data">18:00 - 19:00</td>
                                    <td id="18:00 - 19:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                                <tr id="12">
                                    <td id="0" class="slot_data">19:00 - 20:00</td>
                                    <td id="19:00 - 20:00" class="slot unchecked" data-class="unchecked"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

            <div class="col">
                <div id="confirm_buttons" style="display:none;" class="confirm">
                    <button type="submit" id="confirm" class="btn btn-primary">Confirm</button>
                    <button type="submit" id="reset" class="btn btn-alert">Reset</button>
                </div>

                <div id="booking_confirmation" title="Booking Confirmation">
                    <div class="selection_div"></div>
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

                <!-- this is a dump of the users table useful to make our edit table
                <p>{{ $user_table }}</p>-->

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
                        <td id="row1col0" class="slot_data">08:00 - 09:00</td>
                        <td id="row1col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row1col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row1col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row1col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row1col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row1col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row1col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="2">
                        <td id="row2col0" class="slot_data">09:00 - 10:00</td>
                        <td id="row2col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row2col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row2col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row2col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row2col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row2col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row2col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="3">
                        <td id="row3col0" class="slot_data">10:00 - 11:00</td>
                        <td id="row3col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row3col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row3col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row3col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row3col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row3col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row3col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="4">
                        <td id="row4col0" class="slot_data">11:00 - 12:00</td>
                        <td id="row4col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row4col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row4col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row4col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row4col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row4col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row4col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr id="5">
                        <td id="row5col0" class="slot_data">12:00 - 13:00</td>
                        <td id="row5col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row5col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row5col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row5col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row5col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row5col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row5col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="6">
                        <td id="row6col0" class="slot_data">13:00 - 14:00</td>
                        <td id="row6col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row6col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row6col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row6col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row6col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row6col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row6col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="7">
                        <td id="row7col0" class="slot_data">14:00 - 15:00</td>
                        <td id="row7col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row7col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row7col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row7col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row7col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row7col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row7col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>

                    <tr  id="8">
                        <td id="row8col0" class="slot_data">15:00 - 16:00</td>
                        <td id="row8col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row8col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row8col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row8col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row8col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row8col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row8col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="9">
                        <td id="row9col0" class="slot_data">16:00 - 17:00</td>
                        <td id="row9col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row9col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row9col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row9col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row9col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row9col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row9col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr id="10">
                        <td id="row10col0" class="slot_data">17:00 - 18:00</td>
                        <td id="row10col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row10col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row10col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row10col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row10col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row10col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row10col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="11">
                        <td id="row11col0" class="slot_data">18:00 - 19:00</td>
                        <td id="row11col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row11col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row11col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row11col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row11col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row11col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row11col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                    <tr  id="12">
                        <td id="row12col0" class="slot_data">19:00 - 20:00</td>
                        <td id="row12col1" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row12col2" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row12col3" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row12col4" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row12col5" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row12col6" class="slot unchecked" data-class="unchecked"></td>
                        <td id="row12col7" class="slot unchecked" data-class="unchecked"></td>
                    </tr>
                </table>
            </div>
            <div class="newDiv"></div>

            </div>
            </div>
        <!--Table for displaying all users info -->


        <div class="row">

            <div class="col">
                <h5>Users Table:</h5><button id="edit_users">Edit</button>
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
                    <h5>Slot Table:</h5><button id="edit_slots">Edit</button>
                    <table class="table table-responsive">
                        <thead>
                            <br>
                            <tr>
                                <th>SLOT ID</th>
                                <th>lesson_start</th>
                                <th>User_Name</th>
                                <th>User_email</th>
                                <th>n_students</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($slot_table as $slot)
                                    <tr>
                                        <th scope="row">{{  $slot['id']}}</th>
                                        <td>{{ $slot['lesson_start']}}</td>
                                        <td>User_Name</td>
                                        <td>User_email</td>
                                        <td>{{ $slot['n_students']}}</td>
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
        $(function booking() {
            //displays the datepicker
            $("#datepicker").datepicker({
                onSelect:function(date,inst){

                    select_date = date;//11/12/2013 09:00 10:00
                    //console.log(select_date);
                    $("#accordion").css('display','block');
                }
            });
            $("#accordion").accordion({
                collapsible: true,
                heightStyle: "content"
            });


            $( "#booking_confirmation" ).css('display','none');
            $( "#booking_sent" ).css('display','none');
        });
        //Slot time management and display in the table below the week
        $('.slot').click(function(){
            var className = $(this).data('class');//unchecked

            time_slot = $(this).attr('id');
            //console.log(time_slot);//13:00 - 14:00

            var className2 = className.slice(2,className.length); //toggles between (un)checked
            $(this).toggleClass(className).toggleClass(className2);
            //we want to display a table with the selected hours
            var selection_table = '<p id="tablefor-'+className+'">Lesson for <br>'+select_date+'<br> at '+time_slot+'<br>selected.</p>';
            //Tell me if this element of the class slot was clicked!
            if($(this).data("clicked")){
                //someone clicked so table is already somewhere, lets find it and erase it!
                $(".selection_div").find("#tablefor-" + className).remove();
            } else {
                //this means that the slot has not been clicked so append awesome table
                $(".selection_div").append(selection_table);
            }
            //reverses the data- to register the change on the clicked element
            $(this).data("clicked", !$(this).data("clicked"));
            if($(".selection_div")!==null){$(".confirm").css('display','block');}else{$(".confirm").css('display','none');}
        });

        $('#confirm').on('click', function(){
            //ajax request
            $.ajax(
                {
                    method : 'post',
                    url: '{{ action('Api\ReservationController@create_reservation')}}',
                    data: {
                        date: select_date,
                        time: time_slot
                    },
                    success: function(data){
                        console.log(data);
                    }
                }
            );
            $( "#booking_confirmation" ).dialog();

        });
        $('#reset').on('click', function(){
            // should be a function booking();
            location.reload();

        });
        $('#accept').on('click', function(){

            $( "#booking_confirmation" ).dialog("close");
            $( "#booking_sent" ).dialog();

        });
        $('#cancel').on('click', function(){
            $( "#booking_confirmation" ).dialog("close");

        });

        $('#back').on('click', function(){
            $( "#booking_sent" ).dialog("close");
            $( "#booking_confirmation" ).dialog("close");
            $("#accordion").css('display','none');
            $("#confirm_buttons").css('display','none');


        });


    </script>
    
    <script type="text/javascript">
    // Week picker
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

                //we clean first all that was previously on the table

                //we assign the clicked date to each day of the week

                var header_day = $('th#day0').text();
                header_day = header_day.slice(5,7);//19
                var monday = header_day;
                var tuesday = monday+1;
                var wednesday = tuesday+1;
                var thursday = wednesday+1;
                var friday = thursday+1;
                var saturday = friday+1;
                var sunday = saturday+1;

                //given a specific week we get the booked slots from moday to friday from slots(or reservation) table

                //if from the DB that date exist give it the proper column, col2

                //if from the DB that time exist give it the proper column, row2

                // and append to the matches with a function that append not empty columns and rows
                //change the css of the selected row

                $("#row1col4").append('booked');

                $.ajax({
                    method: 'get',
                    url: '{{ action('Api\ReservationController@week') }}' ,
                    data : { monday: startDate},
                    success: function(data){
                        console.log(data);
                        //take the data an assign into
                    }

                });

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
