<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
}
$salespersonid=$_SESSION["empcode"];
//$partyid=isset($_GET['pid']);
require_once"connection.php";
require_once"top.php";
$sql="select * from parties";
$fd=mysqli_query($con,$sql);

if(isset($_POST['sbtn'])){
$partyid=$_POST['partyname'];
$amountreceived=$_POST['amountreceived'];
$mode=$_POST['mode'];
$chqno=$_POST['chqno'];
$chqdate=$_POST['chqdate'];
$bank=$_POST['bank'];
//cid	partyid	amountreceived	mode	chqno	chqdate	bank	branch	balance	date	
$cdq="INSERT INTO collections(partyid,amountreceived,mode,chqno,chqdate,bank,salespid)values('$partyid','$amountreceived','$mode','$chqno','$chqdate','$bank','$salespersonid')";

// echo $cdq;
// die();
if(mysqli_query($con,$cdq)){
  if($mode=='cash'){
    $ft="select * from parties where partyid=$partyid";
    
    $dt=mysqli_query($con,$ft);
    while($bl=mysqli_fetch_array($dt)) {
        $cur=$bl['bal'];

    }
    $fnbal=$cur-$amountreceived;
  $upd="update parties set lastbal='$cur',bal='$fnbal' where partyid='$partyid'";
  mysqli_query($con,$upd);

}

}


}


?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Collection</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Collection Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group " id="">
                      <label for="party">Party</label>
                      <select name="partyname" class="form-control select2 select2bs4" id="party" tabindex="-1" aria-hidden="true" required="">
                        <option val="null">Select Party </option>
                        <?php
                       while ($party= mysqli_fetch_array($fd)) {
                         
                        
                        echo "<option value='". $party['partyid'] ."'>" .$party['shopname'] ."</option>"; 
                       }

                    ?>
                      </select>
            
                      </div>

                    
                  <div class="form-group">
                    <label for="amt">Amount Received</label>
                    <input type="text" name="amountreceived" class="form-control" id="" placeholder="Enter Amount" required="">
                  </div>

                  <div class="form-group " id="">
                      <label for="mtype">Mode </label>
                      <select name="mode" class="form-control select2 select2bs4" id="designation" tabindex="-1" aria-hidden="true" required="">
                        <option val="null">Select Payment Type</option>
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque</option>
                      </select>

            
                      </div>
                      <div class="form-group">
                    <label for="cnum">Cheque Number</label>
                    <input type="text" name="chqno" class="form-control" id="" placeholder="Enter Cheque Number">
                  </div>
                    <div class="form-group">
                    <label for="bank">Bank</label>
                    <input name="bank" type="text" class="form-control" id="" placeholder="Enter Bank Name">
                  </div>
                                    <div class="form-group">
                    <label for="amt">Cheque Date</label>
                    <input type="date" name="chqdate" class="form-control" id="" placeholder="">
                  </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="sbtn"class="btn btn-primary">Submit</button>
                  </div>
              </form>
  
            </div>
                </div>
                <!-- /.card-body -->





          </div>
          <!--/.col (left) -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
require_once"footer.php";

?>