<?php
	session_start();
	if(!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM']))
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
	
	$q1="DELETE FROM `orphanageadmin` WHERE `idOrph` ='$idOrph' AND email='$email';";
	if(mysqli_query($db,$q1))
	{
		echo "<script>window.alert('$nameOrph has been Deleted .')</script>";
		echo "<script>window.location='Orphanages.php'</script>";
	}
	else
	{
		echo "<script>window.alert(' Sorry an error is occur , please try again ')</script>";
		echo "<script>window.location='Orphanages.php'</script>";
	}
	mysqli_close($db);
	?>
</body>
</html>