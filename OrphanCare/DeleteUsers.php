<?php
	session_start();
	if(!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entering this page")</script>';
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
	
	$q1 = "DELETE FROM `users` WHERE `NID` ='$NID' AND email='$email';";
	if(mysqli_query($db, $q1))
	{
		$q2 = "DELETE FROM `requestorph` WHERE emailU='$email';";
		$q3 = "DELETE FROM `requestsvol` WHERE emailU='$email';";
		$q4 = "DELETE FROM `requestsvol` WHERE email='$email';";
		if(mysqli_query($db, $q2) && mysqli_query($db, $q3) && mysqli_query($db, $q4))
		{
			echo "<script>window.alert('The User $name has been Deleted.')</script>";
			echo "<script>window.location='Users.php'</script>";
		}
		else
		{
			echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
			echo "<script>window.location='Users.php'</script>";
		}
	}
	else
	{
		echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
		echo "<script>window.location='Users.php'</script>";
	}
	mysqli_close($db);
	?>
</body>
</html>
