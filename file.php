<?php

    //Create connection
include"connection.php";
    if($_POST['lat'] && $_POST['long'] && $_POST['salesid']){
      $lat = $_POST['lat'];
      $long = $_POST['long'];
      $salesid=$_POST['salesid'];

      $q = "INSERT INTO location (lat, lang,salesid) VALUES ('$lat', '$long','$salesid')";

      $query = mysqli_query($con, $q);

      if($query){
          echo json_encode("Data Inserted Successfully");
          }
      else {
          echo json_encode('problem');
          }
      }

?>