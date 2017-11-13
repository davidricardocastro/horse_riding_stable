
@extends('wrapper')

@section('content')


    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_booking.css') }}">
    <div class="container background_light">
        <div class="row">
            <div class="col-12">

                <h3>Welcome {{ $user_name }} <br> Please select a date: </h3>
            </div>

            <div class="col-12">

                <div id="datepicker"></div>
            </div>

            <div class="col-12">
                <div id="accordion" style="display:none;">
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
                    <p>Thank you for your reservation. You will receive an email with the deatils of your lesson</p>

                    <input type="text" value="test">
                    <button type="submit" id="back" class="btn btn-primary">Continue</button>

                </div>
            </div>
        </div>

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
            )
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

@endsection
