<?php
	session_start();
	if(!isset($_SESSION['emailO']) || !isset($_SESSION['passwordO']))
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
		$stmt = $db->prepare("SELECT * FROM requestorph WHERE idEvent = ?");
		$stmt->bind_param("i", $idEvent);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows == 0)
		{
			echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
			echo "<script>window.location='RequestsO.php'</script>";
		}
		else
		{
			$request = $result->fetch_assoc();

			$query = "INSERT INTO requestmstry (idEvent, emailU, nameU, nameEvent, dateEvent, timeEvent, timeEvent1, addressEvent, typeEvent, descriptionEvent, idOrph, nameOrph) 
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $db->prepare($query);
			$stmt->bind_param("isssssssssss", $request['idEvent'], $request['emailU'], $request['nameU'], $request['nameEvent'], $dateEvent, $request['timeEvent'], $request['timeEvent1'], $request['addressEvent'], $request['typeEvent'], $request['descriptionEvent'], $request['idOrph'], $request['nameOrph']);

			if($stmt->execute())
			{
				$stmt->close();

				$query = "DELETE FROM requestorph WHERE idEvent = ?";
				$stmt = $db->prepare($query);
				$stmt->bind_param("i", $idEvent);

				if($stmt->execute())
				{
					echo '<script>window.alert("The request has been accepted, \nNow a copy will be sent to the ministry and there is the final response. \nThank you.")</script>';
					echo "<script>window.location='RequestsO.php'</script>";
				}
				else
				{
					echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
					echo "<script>window.location='RequestsO.php'</script>";
				}
			}
			else
			{
				echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
				echo "<script>window.location='RequestsO.php'</script>";
			}
		}
	}
	else if ($_POST['submit'] == 'Decline') 
	{
		$query = "DELETE FROM requestorph WHERE idEvent = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $idEvent);

		if($stmt->execute())
		{
			echo "<script>window.alert('The request has been Declined, thank you .')</script>";
			echo "<script>window.location='RequestsO.php'</script>";
		}
		else
		{
			echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
			echo "<script>window.location='RequestsO.php'</script>";
		}
	}

	$stmt->close();
	$db->close();
	?>
</body>
</html>
