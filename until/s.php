//Select change
<script>
$("select").on("change", function(){
        id = this.value;
         $.ajax({
              url: 'url',
              type: 'POST',
              data: {
                        id: this.value
                    },
        }).done(function(response) {
                //remove old data
                $('#fullCalendar').fullCalendar('removeEvents');
                 
                //Getting new event json data
                $("#fullCalendar").fullCalendar('addEventSource', response);

                //Updating new events
                $('#fullCalendar').fullCalendar('rerenderEvents');

                //getting latest Events
                $('#fullCalendar').fullCalendar( 'refetchEvents' );

                //getting latest Resources
                $('#fullCalendar').fullCalendar( 'refetchResources' );
            

        });
    });



    $('#users_menu').change(function() {

var events = {
    url: "ajax/getMyEvents.php",
    type: 'POST',
    data: {
        user_id: $(this).val()
    }
}

$('#calendar').fullCalendar('removeEventSource', events);
$('#calendar').fullCalendar('addEventSource', events);
$('#calendar').fullCalendar('refetchEvents');
}).change();


$(document).ready(function() {

$('#calendar').fullCalendar({

    header: {
      right: 'prev,next today',
      center: 'title',
      left: 'month,agendaWeek,agendaDay'
    },      

    events: {
        url: "load.php",
        type: 'POST',
        data: {
          drop_services: drop_services
        }
    }
   
    $('#emp').change(function() {

var events = {
    url: "load.php",
    type: 'POST',
    data: {
        user_id: $(this).val()
    }
}

$('#calendar').fullCalendar('removeEventSource', events);
$('#calendar').fullCalendar('addEventSource', events);
$('#calendar').fullCalendar('refetchEvents');
}).change();


});


$('#users_menu').change( function(){

    $('#calendar').fullCalendar( 'refetchEvents' );
});

});














    </script>