<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	else {
		$email = $_SESSION["emailU"];
		include("dbCon.php");
		$Vo="SELECT * FROM `requestsvol` WHERE `email` = '$email' AND `status` = '0'";
		$Volun=mysqli_query($db,$Vo);
		$numberNotificationsVolunteer = mysqli_num_rows($Volun);
		if($numberNotificationsVolunteer == 0)
		{
			return false;
		}
		else
		{
			return $numberNotificationsVolunteer;
		}
		mysqli_close($db);
	}
?>