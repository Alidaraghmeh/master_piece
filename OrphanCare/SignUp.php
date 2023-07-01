<html>
<head>
	<meta charset="utf-8">
	<meta data="utf-8">
</head>
<body>
    <?php 
	extract($_POST);
	include("dbCon.php");
	
	$checkE="SELECT email FROM users WHERE email='$email'";
	$checkEmail=mysqli_query($db,$checkE,);
	$checkN="SELECT NID FROM users WHERE NID='$NID'";
	$checkNID=mysqli_query($db,$q);
	if(mysqli_num_rows($checkEmail) > 0)
	{
		echo "<script>window.alert('E-mail is Existing, please change it')</script>";
		echo '<script>window.location="JoinUS.html"</script>';
	}
	elseif(mysqli_num_rows($checkNID) > 0)
	{
		echo "<script>window.alert('National ID is Existing, please change it')</script>";
		echo '<script>window.location="JoinUS.html"</script>';
	}
	else
	{
		date_default_timezone_set("Etc/GMT-3");
		$localtime = localtime();
		$localtime_assoc = localtime(time(), true);
		$date=date("Y");
		$parts = explode("-", "$DOB");
		$age=$date-$parts[0];
		$q= "INSERT INTO `users`(`name`, `NID`, `phone`, `age`, `gender`, `address`, `email`, `password`, `volunteer`, `ATime`)
						VALUES ('$name','$NID','$phone','$age','$gender','$address','$email','$password','$volunteer','$ATime')";
		if(mysqli_query($db,$q))
		{
			echo '<script>window.alert("Registration Successful \nPlease Sign in to activate your account")</script>';
			echo '<script>window.location="JoinUS.html"</script>';
		}
		else
		{
			echo "<script>window.alert(' Sorry an error is occur , please try again ')</script>";
			echo '<script>window.location="JoinUS.html"</script>';
		}
	}
	mysqli_close($db);
	?>
</body>
</html>