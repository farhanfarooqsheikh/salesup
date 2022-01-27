<?php

    	$con=mysqli_connect("localhost", "root", "", "salesup");
		if ( mysqli_connect_errno() ) {
		      echo "<script>alert('Connection Failed');</script>";
			exit('Failed to connect to MySQL: ' . mysqli_connect_error());
		}

?>