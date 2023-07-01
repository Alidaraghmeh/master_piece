<?php
	session_start();
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
	
	// Customers=users
	$C = "SELECT name,NID,email,password  FROM users 
		WHERE  email ='$email'";
	$Cus = mysqli_query($db, $C);
	$Customer = mysqli_fetch_array($Cus);
	if($Customer[2] == "$email")
	{
		echo '<script>window.alert("An email containing the password has been sent to you .")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	
	// Owner=orphanageAdmin
	$O = "SELECT * FROM orphanageadmin 
		WHERE  email ='$email'";
	$Own = mysqli_query($db, $O);
	$Owner = mysqli_fetch_array($Own);
	if($Owner[4] == "$email")
	{
		echo '<script>window.alert("An email containing the password has been sent to you .")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	echo '<script>window.alert("E-mail OR PASSWORD NOT Correct , Please try again .")</script>';
	echo '<script>window.location="Forgot.html"</script>';
    mysqli_close($db);
	?>
</body>
</html>
