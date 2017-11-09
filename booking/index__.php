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
<h3 class="ui-accordion ui-accordion-header weekday day1">Please select a date</h3>
        
    <div id="datepicker"></div>

    <?php include_once 'accordion.php'; ?>

    <div id="confirmbtns" style="display:none;" class="confirm"> 
    <button type="submit" id="confirm" class="btn btn-primary">Confirm</button> 
    <button type="submit" id="reset" class="btn btn-primary">Reset</button> 
    </div>

    <div id="overlay" title="Booking Confirmation">
    <div class="newDiv"></div>
    <button type="submit" id="accept" class="btn btn-primary">Accept</button> 
    <button type="submit" id="cancel" class="btn btn-primary">Cancel</button> 
    </div>

    <div id="finish" title="Success">
        <p>Thank you for your reservation. You will receive an email when is accepted by the Stabe</p>
        <button type="submit" id="back" class="btn btn-primary">continue</button> 
    
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/jquery-ui.min.js"></script>
<script>
    $(function () {
        //displays the datepicker
        $("#datepicker").datepicker({       
            onSelect:function(date,inst){
                //console.log(date);
                $("#accordion").css('display','block');
                //.css({display:'block', color: 'red'}    
            }
        });
                $("#accordion").accordion({
                    collapsible: true,
                    heightStyle: "content"
                    });
                $( "#overlay" ).css('display','none');
                $( "#finish" ).css('display','none');
    });
//Slot time management and display in the table below the week
    $('.slot').click(function(){
        var className = $(this).data('class');//unchecked
        var parentVal = $(this).parent().attr('id');
        var elementVal = $(this).attr('id');
        var className2 = className.slice(2,className.length) //checked by slicing the string
        $(this).toggleClass(className).toggleClass(className2);
        //we want to display a table with the selected hours
        var newTable = '<p id="tablefor-'+className+'">Lesson for a hour X was selected</p>';
        //Tell me if this element of the class slot was clicked!
        if($(this).data("clicked")){
            //someone clicked so table is already somewhere, lets find it and erase it!
            $(".newDiv").find("#tablefor-" + className).remove();
        } else {
            //this means that the slot has not been clicked so append awesome table
            $(".newDiv").append(newTable);
        }
        //reverses the data- to register the change on the clicked element
        $(this).data("clicked", !$(this).data("clicked"));
        if($(".newDiv")!==null){$(".confirm").css('display','block');}else{$(".confirm").css('display','none');}  
     });

    $('#confirm').on('click', function(){
        $( "#overlay" ).dialog();
        
    });
    $('#accept').on('click', function(){
        $( "#overlay" ).remove();
        $( "#finish" ).dialog();
    });
    $('#back').on('click', function(){
        alert('here the redirect to the member area');
      // $( "#finish" ).css('display','none');
       //$("#accordion").css('display','none');
       //$("#confirmbtns").css('display','none');
       //here redirect to the memeber area
    });
</script>
</html>
