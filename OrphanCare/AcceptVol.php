<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
	{
		echo '<script>window.alert("Oooh! Sorry, You must SignIn before entering this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
		exit();
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
	
	if ($_POST['submit'] == 'Accept') 
	{
		$query = "INSERT INTO volunteers (emailV, nameV, idEvent) 
							VALUES (?, ?, ?)";
		$stmt = $db->prepare($query);
		$stmt->bind_param("ssi", $emailV, $nameV, $idEvent);

		if($stmt->execute())
		{
			$stmt->close();

			$query = "DELETE FROM requestsvol WHERE idEvent = ? AND email = ?";
			$stmt = $db->prepare($query);
			$stmt->bind_param("is", $idEvent, $emailV);

			if($stmt->execute())
			{
				echo "<script>window.alert('The request has been accepted, thank you .')</script>";
				echo "<script>window.location='RequestsU.php'</script>";
			}
			else
			{
				echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
				echo "<script>window.location='RequestsU.php'</script>";
			}
		}
		else
		{
			echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
			echo "<script>window.location='RequestsU.php'</script>";
		}
	}
	else if ($_POST['submit'] == 'Decline') 
	{
		$query = "DELETE FROM requestsvol WHERE idEvent = ? AND email = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param("is", $idEvent, $emailV);

		if($stmt->execute())
		{
			echo "<script>window.alert('The request has been Declined, thank you .')</script>";
			echo "<script>window.location='RequestsU.php'</script>";
		}
		else
		{
			echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
			echo "<script>window.location='RequestsU.php'</script>";
		}
	}
	$stmt->close();
	$db->close();
	?>
</body>
</html>
