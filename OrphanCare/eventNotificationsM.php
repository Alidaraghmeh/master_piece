<?php
	session_start();
	if(!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	else {
		include("dbCon.php");
		$Re="SELECT * FROM requestmstry WHERE `status` = '0'";
		$Req=mysqli_query($db,$Re);
		$numberNotificationsM = mysqli_num_rows($Req);
		if($numberNotificationsM == 0)
		{
			return false;
		}
		else
		{
			return $numberNotificationsM;
		}
		mysqli_close($db);
	}
?>