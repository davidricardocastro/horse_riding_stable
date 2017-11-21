
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

        <div class="container">
        <div class="row">
        <div class="col">
    
            <div class="week-picker"></div>
                <label>Week :</label> <span id="startDate"></span> - <span id="endDate"></span>
                <h3>Administrator's Master Menu</h3>
                <h5>Slot details:<h5>
                <!-- this is a dump of the users table useful to make our edit table
                -->
                <div id="container table_desktop">
                    
                <table class="table m-0">
                    <thead>
                        <tr>
                        <th class="slot_title">Time_Slot</th>
                        @for ($i = 0; $i < 7; $i++) 
                            <th id="day{{ $i }}" class="weekday day{{ $i + 1}}">
                            </th>
                        @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label p-0">
                                <div class="container p-0" style="width:80px; height:1140px" id="inner_table">
                                    @for ($j = 5; $j < 24; $j++)
                                    <div class="row p-0" style="width:80px; height:60px">
                                        {{ $j }}
                                    </div>
                                    @endfor
                                </div>
                            </td>
                            @for ($i = 0; $i < 7; $i++)
                            <td class="p-0">
                                <div class="container m-0 p-0" style="height:1140px" id="inner_table">
                                    <script>
                                        function loadSlots(from, until) {
                                            $.ajax({
                                                method: 'get',
                                                url: '{{ action('Api\ReservationController@getSlotsForTime') }}',
                                                data: {
                                                from: from,
                                                until: until,
                                                },
                                                success: function(data) {
                                                generateSlots(data);
                                                }
                                            })
                                        }
                                        function generateSlots(data) {
                                            
                                        }
                                    </script>
                                </div>
                            </td>
                            @endfor
                        <tr>
                    </tbody>
                </table>

                    
            </div>
            
            </div>
        <!--Table for displaying all users info -->


        
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
        // week-picker
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

                var intervalstart = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay()+ 0);
                var intervalend = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay()+ 7);

                loadSlots(
                    $.datepicker.formatDate('yy-mm-dd 00:00:00', intervalstart,inst.settings), 
                    $.datepicker.formatDate('yy-mm-dd 00:00:00', intervalend,inst.settings),
                );
                


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
