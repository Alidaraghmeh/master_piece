<?php
	session_start();
	if(!isset($_SESSION['emailO']) || !isset($_SESSION['passwordO'])) {
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	else {
		$idOrph=$_SESSION["idOrph"];
		include("dbCon.php");
		$N="SELECT * FROM newsletters WHERE `orphanStatus` NOT LIKE '%$idOrph%'";
		$News=mysqli_query($db,$N);
		$numberNotifications = mysqli_num_rows($News);
		if($numberNotifications == 0)
		{
			return false;
		}
		else
		{
			return $numberNotifications;
		}
		mysqli_close($db);
	}
?>