@extends('wrapper')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_booking.css') }}">
    <div class="container background_light">
       <div class="row">
       <div class="col-12">
       
       <h3>Please select a date</h3>
       </div>
            
        <div class="col-12">

        <div id="datepicker"></div>
        </div>

        <div class="col-12">
        <div id="accordion" style="display:none;">
            <h3 class="weekday day1">Please select a time</h3>
            <table class="table" id="table_mobile" style="width:100%">
                <tr class="" id="1">
                    <td id="0" class="slot_data">08:00 - 09:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked">Gruop(1/4)</td>
                </tr>
                <tr class="" id="2">
                    <td id="0" class="slot_data">09:00 - 10:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked">Ind 1</td>
                </tr>
                <tr class="" id="3">
                    <td id="0" class="slot_data">10:00 - 11:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="4">
                    <td id="0" class="slot_data">11:00 - 12:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="5">
                    <td id="0" class="slot_data">12:00 - 13:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="6">
                    <td id="0" class="slot_data">13:00 - 14:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="7">
                    <td id="0" class="slot_data">14:00 - 15:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="8">
                    <td id="0" class="slot_data">15:00 - 16:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="9">
                    <td id="0" class="slot_data">16:00 - 17:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="10">
                    <td id="0" class="slot_data">17:00 - 18:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="11">
                    <td id="0" class="slot_data">18:00 - 19:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
                </tr>
                <tr class="" id="12">
                    <td id="0" class="slot_data">19:00 - 20:00</td>
                    <td id="1" class="slot unchecked" data-class="unchecked"></td>
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
            <button type="submit" id="back" class="btn btn-primary">Continue</button>

        </div>
        </div>
    </div>

    </div>
@endsection
@section('scripts')
        <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
        <script>
            $(function () {
                //displays the datepicker
                $("#datepicker").datepicker({
                    onSelect:function(date,inst){
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
                var parentVal = $(this).parent().attr('id');
                var elementVal = $(this).attr('id');//info for the selection table from datepicker
                var className2 = className.slice(2,className.length); //toggles between (un)checked
                $(this).toggleClass(className).toggleClass(className2);
                //we want to display a table with the selected hours
                var selection_table = '<p id="tablefor-'+className+'">Lesson for a hour X was selected</p>';
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
                $( "#booking_confirmation" ).dialog();

            });
            $('#accept').on('click', function(){
                //$( "#booking_confirmation" ).hide();
                $( "#booking_sent" ).dialog();
            });

            $('#back').on('click', function(){
                alert('here the redirect to the member area');

            });


        </script>

    @endsection
