<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/jquery-ui.min.css">
<link rel="stylesheet" href="/style_booking.css">  
<title>Booking</title>         
</head>

<body>
<h3>Please select a date</h3>
        
    <div id="datepicker"></div>

    <?php include_once 'accordion.php'; ?>

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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/jquery-ui.min.js"></script>
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
        var className2 = className.slice(2,className.length) //toggles between (un)checked
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
</html>
