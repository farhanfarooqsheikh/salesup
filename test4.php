<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" enctype="multipart/form-data">

     <input type="file" name="up" class="custom-file-input" id="dp">

     <input type="submit" name="submit">		
	</form>

</body>
</html>

<?php
  
  if(isset($_POST['submit']))
  {
  	  require_once('connection.php');
  	    $imgname=$_FILES['up']['name'];
        $source= $_FILES['up']['tmp_name'];
        $desination='uploads/'.rand().time().$imgname;
        move_uploaded_file($source, $desination);
  }

?>