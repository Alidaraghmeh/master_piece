<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
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
	
	$q= "INSERT INTO `requestsvol`( `emailU`, `nameU`, `idEvent`, `email`) 
						VALUES ('$emailU','$nameU','$idEvent','$email')";
	if(mysqli_query($db,$q))
	{
		echo "<script>window.alert('The Request will be reviewed by the $name . If accepted, it will display on the Events page .')</script>";
		echo "<script>window.location='AddVolunteers.php?idEvent=$idEvent&nameEvent=$nameEvent&timeEvent=$timeEvent'</script>";
	}
	else
	{
		echo "<script>window.alert(' Sorry an error is occur , please try again ')</script>";
		echo '<script>window.location="AddVolunteers.php?idEvent=$Event[0]&nameEvent=$Event[3]&timeEvent=$Event[5]"</script>';
	}
	mysqli_close($db);
	?>
</body>
</html>