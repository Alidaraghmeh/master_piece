<?php
	session_start();
	if(!isset($_SESSION['emailO']) || !isset($_SESSION['passwordO'])) {
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	else {
		$idOrph=$_SESSION["idOrph"];
		include("dbCon.php");
		$Re="SELECT * FROM requestorph WHERE `idOrph` = '$idOrph' AND `status` = '0'";
		$Req=mysqli_query($db,$Re);
		$numberNotificationsE = mysqli_num_rows($Req);
		if($numberNotificationsE == 0)
		{
			return false;
		}
		else
		{
			return $numberNotificationsE;
		}
		mysqli_close($db);
	}
?>