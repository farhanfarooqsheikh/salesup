<?php
//index.php
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
   

} 
require_once"connection.php";
require_once"top.php";
if ($_SESSION['id']!="admin"){
  $id=$_SESSION['empcode'];
  $where="where id=$id";
}
else{
  $where="where 1";
}

?>
<style>

.card-primary {
    background-color: transparent !important;
    border-color: none;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            
            
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Select Sales Person</h3>
              </div>
              <div class="card-body">

                <!-- /btn-group -->
                <div class="form-group">
          
            <select name="emp" id="emp" class="form-control select2 select2bs4" >
                 
            
                    <?php
                    $empdetails=mysqli_query($con,"Select * from employees $where ");

                       while ($emp= mysqli_fetch_array($empdetails)) {
                             ?> 
                        
                        <option value='<?php echo $emp['id'];?>'> <?php echo $emp['name'] ?></option> 
                       <?php
                       }

                    ?>
                  </select>
                
            </div>
                <!-- /input-group -->
              
            </div>
          </div>
        </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once"footer.php";?>
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- Page specific script -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>

<!-- <!DOCTYPE html>
<html>
 <head>
  <title>Employee Attendance Report</title>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> 
  <script>
   
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
          drop_services: $('#emp').val()
        }
    }
   
  


});


   });

   $('#emp').change(function() {

var events = {
    url: "load.php",
    type: 'POST',
    data: {
          drop_services: $('#emp').val()
        }
}

$('#calendar').fullCalendar('removeEventSource', events);
$('#calendar').fullCalendar('addEventSource', events);
$('#calendar').fullCalendar('refetchEvents');
}).change();
































//   $(document).ready(function() {
//    // $(document).on("change", 'select[name^="emp"]',function() {
//       var drop_services = $(this).val();
//       alert(drop_services);
//    var calendar = $('#calendar').fullCalendar({
//     plugins: [ 'bootstrap' ],
//   themeSystem: 'bootstrap',
//     editable:false,
//     header:{
//      left:'prev,next today',
//      center:'title',
//      right:'month,agendaWeek,agendaDay'
//     },
//     events: {
//     url: 'load.php',
    
//     method: 'POST',
//     data: {
//           drop_services: drop_services
//         },
     
//     failure: function() {
//       alert('there was an error while fetching events!');
//     },
    
//   },
 
//    });
//   });
//   $('#emp').change(function() {

// var events = {
//     url: "load.php",
//     type: 'POST',
//     data: {
//           drop_services: drop_services
//         }
// }

// $('#calendar').fullCalendar('removeEventSource', events);
// $('#calendar').fullCalendar('addEventSource', events);
// $('#calendar').fullCalendar('refetchEvents');
// }).change();
//   });
//   $(document).ready(function() {
//   $(document).on("change", 'select[name^="productname"]', function(event) {
//     var drop_services = $(this).val();
//     $.ajax({
//         url: 'load.php',
//         type: 'POST',
//         data: {
//           drop_services: drop_services
//         },
//       }).done(function(data) {
//                 //remove old data
//                 $('#calendar').fullCalendar('removeEvents');
                 
//                 //Getting new event json data
//                 $("#calendar").fullCalendar('addEventSource', data);

//                 //Updating new events
//                 $('#calendar').fullCalendar('rerenderEvents');

//                 //getting latest Events
//                 //$('#fullCalendar').fullCalendar( 'refetchEvents' );
//                // $('#calendar').fullCalendar( 'refetchEvents' );

//                 //getting latest Resources
//                 $('#calendar').fullCalendar( 'refetchResources' );
            

//         });



//   });
// });
  </script>
 <!-- </head>
 <body>
  <br />
  <h2 align="center"><a href="#">Jquery Fullcalandar Integration with PHP and Mysql</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
 </body>
</html> -->
