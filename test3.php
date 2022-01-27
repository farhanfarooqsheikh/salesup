<?php
  require_once('connection.php');
  $result= mysqli_query($con,"select id,name from test");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
      
        // while ($r= mysqli_fetch_array($result)) {
        //  	echo $r['id'];
        //  	echo $r['name'];
        //  	echo $r['cont'];
        //  	echo "<br>";
        //  } 

	    echo "<table border='3px'>";
	      echo "<tr>";
	        echo "<th>". "Id". "</th>";
	        echo "<th>". "name". "</th>";
	        //echo "<th>". "cont". "</th>";
	      echo "</tr>";  
	      while ($r= mysqli_fetch_array($result)) {
	      	 echo "<tr>";
         	echo "<td>".$r['id']. "</td>";
         	echo "<td>". $r['name']. "</td>";
          	echo "<td>". $r['cont']. "</td>";
          	echo "</tr>";
         } 


    
	?>



</body>
</html>