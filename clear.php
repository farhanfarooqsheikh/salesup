<?php

require_once"connection.php";
$cid=$_GET['cid'];
$partyid=$_GET['pid'];
$amountreceived=$_GET['amt'];
mysqli_query($con,"update collections set chqstatus='cleared' where cid='$cid'");
$ft="select * from parties where partyid=$partyid";
    
    $dt=mysqli_query($con,$ft);
    while($bl=mysqli_fetch_array($dt)) {
        $cur=$bl['bal'];

    }
    $fnbal=$cur-$amountreceived;
  $upd="update parties set bal='$fnbal' where partyid='$partyid'";
  mysqli_query($con,$upd);

  echo "<script> document.location.href='pdc.php';</script>"; 



?>