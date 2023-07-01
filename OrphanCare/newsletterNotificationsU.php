<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	else {
		$NIDU = $_SESSION["NIDU"];
		include("dbCon.php");
		$N="SELECT * FROM newsletters WHERE `orphanStatus` NOT LIKE '%$NIDU%'";
		$News=mysqli_query($db,$N);
		$numberNotificationsU = mysqli_num_rows($News);
		if($numberNotificationsU == 0)
		{
			return false;
		}
		else
		{
			return $numberNotificationsU;
		}
		mysqli_close($db);
	}
?>