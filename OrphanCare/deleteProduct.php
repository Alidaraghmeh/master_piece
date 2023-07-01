<?php
	session_start();
	if(!isset($_SESSION['emailO']) || !isset($_SESSION['passwordO']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta data="utf-8">
</head>
<body>
    <?php 
	extract($_POST);
	include("dbCon.php");
	
	$filename = "UploadImages/$file";
	if (!unlink($filename)) {
		echo "<script>window.alert(' Error deleting $filename ')</script>";
		echo '<script>window.location="product.php"</script>';
	}
	else {
		$q="DELETE FROM `products` WHERE id='$id' AND `name` ='$name' AND `image` ='$file'";
		if(mysqli_query($db,$q1)) {
			$q1="DELETE FROM `homeworksstd` WHERE idHW ='$idHW' AND `class` ='$class'";
			mysqli_query($db,$q1);
			echo "<script>window.alert('The product $name has been deleted successfully')</script>";
			echo '<script>window.location="product.php"</script>';
		}
		else {
			echo "<script>window.alert(' Sorry an error is occure , please try agian ')</script>";
			echo '<script>window.location="product.php"</script>';
		}
	}
  	mysqli_close($db);
	?>
</body>
</html>