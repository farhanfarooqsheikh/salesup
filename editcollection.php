<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
}
$salespersonid=$_SESSION["empcode"];
//$partyid=isset($_GET['pid']);
require_once"connection.php";
require_once"top.php";
$cid=$_GET['cid'];
$sql="select * from collections join employees on employees.id=collections.salespid and collections.cid=$cid";

$fd=mysqli_query($con,$sql);

while($r=mysqli_fetch_array($fd)){
$pids=$r['partyid'];
$amt=$r['amountreceived'];
$bank=$r['bank'];
$mode=$r['mode'];
$chqno=$r['chqno'];
$chqdate=$r['chqdate'];
$date=$r['date'];

}
if(isset($_POST['upbtn'])){

  $partyid=$_POST['partyname'];
  $amountreceived=$_POST['amountreceived'];
  $mode=$_POST['mode'];
  $chqno=$_POST['chqno'];
  $chqdate=$_POST['chqdate'];
  $bank=$_POST['bank'];
  $cbal=$_POST['cbal'];
  // echo "update parties set lastbal='$cbal'where partyid='$partyid'";
  // die();
  mysqli_query($con,"update parties set lastbal='$cbal' where partyid='$partyid'");

  $sl="update collections set partyid='$partyid',mode='$mode',amountreceived='$amountreceived',chqno='$chqno',chqdate='$chqdate',bank='$bank' where cid=$cid";
  if(mysqli_query($con,$sl))
  {
    $ret=mysqli_query($con,"Select * from parties where partyid=$partyid");
    foreach($ret as $st){
      $curbal=$st['bal'];
      $lb=$st['lastbal'];
    }
      $finalbal=$lb-$amountreceived;
      mysqli_query($con,"update parties set bal='$finalbal' where partyid='$partyid'");
      echo '<script>alert("Records Updated")
          
      </script>'; 



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
                      <select name="partyname" class="form-control select2 select2bs4" id="party" tabindex="-1" aria-hidden="true">
                       
                        <?php
                        $afd=mysqli_query($con,"Select * from  parties");
                       while ($party= mysqli_fetch_array($afd)) {
                          $cbal=$party['bal'];
                        ?> 
                        
                        <option value='<?php echo $party['partyid'];?>'
                         <?php if($pids== $party['partyid'])
                         {echo 'selected';} ?>> <?php echo $party['shopname'] ?></option> 
                       <?php
                       }

                    ?>
                      </select>
            
                      </div>

                    <input type="hidden" name="cbal" value="<?php echo $cbal;   ?>">
                  <div class="form-group">
                    <label for="amt">Amount Received</label>
                    <input type="text" name="amountreceived" value="<?php echo htmlspecialchars($amt) ?>"  class="form-control" id="" placeholder="Enter Amount">
                  </div>

                  <div class="form-group " id="">
                      <label for="mtype">Mode </label>
                      <select name="mode" class="form-control select2 select2bs4" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Payment Type</option>
                        <option <?php
                            if($mode=="cash") {
                              echo "selected";}?> value="cash">Cash</option>
                        <option value="cheque" <?php
                            if($mode=="cheque") {
                              echo "selected";}?>>Cheque</option>
                      </select>

            
                      </div>
                      <div class="form-group">
                    <label for="cnum">Cheque Number</label>
                    <input type="text" name="chqno" value="<?php echo htmlspecialchars($chqno) ?>"  class="form-control" id="" placeholder="Enter Cheque Number">
                  </div>
                    <div class="form-group">
                    <label for="bank">Bank</label>
                    <input name="bank" type="text" class="form-control" id="" value="<?php echo htmlspecialchars($bank) ?>"  placeholder="Enter Bank Name">
                  </div>
                                    <div class="form-group">
                    <label for="amt">Cheque Date</label>
                    <input type="date" name="chqdate" class="form-control" id="" value="<?php echo htmlspecialchars($chqdate) ?>"  placeholder="">
                  </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="upbtn"class="btn btn-primary">Submit</button>
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