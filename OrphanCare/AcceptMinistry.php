<?php
	session_start();
	if(!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM']))
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
		$stmt = $db->prepare("SELECT * FROM requestmstry WHERE idEvent = ?");
		$stmt->bind_param("i", $idEvent);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows == 0)
		{
			echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
			echo "<script>window.location='RequestsM.php'</script>";
		}
		else
		{
			$request = $result->fetch_assoc();

			$query = "INSERT INTO events (emailU, nameU, nameEvent, dateEvent, timeEvent, timeEvent1, addressEvent, typeEvent, descriptionEvent, idOrph, nameOrph)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $db->prepare($query);
			$stmt->bind_param("ssssssssiss", $request['email'], $request['name'], $request['nameEvent'], $request['dateEvent'], $request['timeEvent'], $request['timeEvent1'], $request['addressEvent'], $request['typeEvent'], $request['descriptionEvent'], $request['idOrph'], $request['nameOrph']);

			if($stmt->execute())
			{
				$stmt->close();

				$query = "DELETE FROM requestmstry WHERE idEvent = ?";
				$stmt = $db->prepare($query);
				$stmt->bind_param("i", $idEvent);

				if($stmt->execute())
				{
					echo "<script>window.alert('The request has been accepted, thank you.')</script>";
					echo "<script>window.location='RequestsM.php'</script>";
				}
				else
				{
					echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
					echo "<script>window.location='RequestsM.php'</script>";
				}
			}
			else
			{
				echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
				echo "<script>window.location='RequestsM.php'</script>";
			}
		}
	}
	else if ($_POST['submit'] == 'Decline')
	{
		$query = "DELETE FROM requestmstry WHERE idEvent = ?";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $idEvent);

		if($stmt->execute())
		{
			echo "<script>window.alert('The request has been Declined, thank you.')</script>";
			echo "<script>window.location='RequestsM.php'</script>";
		}
		else
		{
			echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
			echo "<script>window.location='RequestsM.php'</script>";
		}
	}

	$stmt->close();
	$db->close();
	?>
</body>
</html>
