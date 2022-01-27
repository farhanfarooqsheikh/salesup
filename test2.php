<?php

  require_once('connection.php');
   $x="hello";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<div id="one"><?php  echo $x; ?></div>

	<?php  echo "<div id='one'>".$x. "</div>" ?>

</body>
</html>


<style type="text/css">
	#one {
		background-color: red;
		padding: 20px;
	}
</style>
