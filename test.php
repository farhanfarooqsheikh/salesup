<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post">
		<input type="text" name="name"><br>
		<input type="text" name="cont"><br>
		<input type="submit" name="btn">

	</form>

</body>
</html>


<?php
  require_once('connection.php');
  
    if(isset($_POST['btn']))
    {
    	  // echo $_POST['name'];
    	  // mysqli_connect("sername", 'username', "", "dbname")

    	mysqli_query($con, " insert into test(name,cont) values ('".$_POST['name']."', '".$_POST['cont']."')");
    }
?>