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
	
	$O="SELECT name FROM orphanage 
		WHERE idOrph='$idOrph'";
	$Orph=mysqli_query($db,$O);
	$nameOrphanage=mysqli_fetch_array($Orph);
	$q= "INSERT INTO `requestorph`( `emailU`, `nameU`, `nameEvent`, `fDate`, `sDate`, `tDate`, `timeEvent`, `timeEvent1`, `addressEvent`, `typeEvent`, `descriptionEvent`, `idOrph`, `nameOrph`) 
					VALUES ('$emailU','$nameU','$nameEvent','$fDate','$sDate','$tDate','$timeEvent','$timeEvent1','$addressEvent','$typeEvent','$descriptionEvent','$idOrph','$nameOrphanage[0]')";
	if(mysqli_query($db,$q))
	{
		echo '<script>window.alert("The event will be reviewed by the supervisor of the orphanage and the ministry .\nIf accepted, it will display on the Events page .")</script>';
		echo '<script>window.location="EventU.php"</script>';
	}
	else
	{
		echo "<script>window.alert(' Sorry an error is occur , please try again ')</script>";
		echo '<script>window.location="EventU.php"</script>';
	}
	mysqli_close($db);
	?>
</body>
</html>