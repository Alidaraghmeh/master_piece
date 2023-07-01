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
	
	//Ministry=Manager
	$M = "SELECT email, password, name FROM ministry WHERE email = ? AND password = ?";
$Ma = mysqli_prepare($db, $M);
mysqli_stmt_bind_param($Ma, "ss", $email, $password);
mysqli_stmt_execute($Ma);
mysqli_stmt_bind_result($Ma, $emailM, $passwordM, $nameM);
mysqli_stmt_fetch($Ma);

if ($emailM == $email && $passwordM == $password) {
    // Code for successful login
    echo '<script>window.location="NewsLettersM.php"</script>';
    $_SESSION["emailM"] = $email;
    $_SESSION["passwordM"] = $password;
    $_SESSION["nameM"] = $nameM;
}

	
	//Customers=users
	$C = "SELECT name, NID, phone, email, password FROM users WHERE email = ? AND password = ?";
	$Cus = mysqli_prepare($db, $C);
	mysqli_stmt_bind_param($Cus, "ss", $email, $password);
	mysqli_stmt_execute($Cus);
	mysqli_stmt_bind_result($Cus, $nameU, $NIDU, $phoneU, $emailU, $passwordU);
	mysqli_stmt_fetch($Cus);
	
	if ($emailU == $email && $passwordU == $password) {
		// Code for successful login
		echo '<script>window.location="NewsLettersU.php"</script>';
		$_SESSION["emailU"] = $email;
		$_SESSION["passwordU"] = $password;
		$_SESSION["nameU"] = $nameU;
		$_SESSION["NIDU"] = $NIDU;
		$_SESSION["phoneU"] = $phoneU;
	}
	
	
	//Owner=orphanageAdmin
	$O = "SELECT * FROM orphanageadmin WHERE email = ? AND password = ?";
	$Own = mysqli_prepare($db, $O);
	mysqli_stmt_bind_param($Own, "ss", $email, $password);
	mysqli_stmt_execute($Own);
	mysqli_stmt_bind_result($Own, $idOrph, $nameO, $phoneO, $addressO, $emailO, $passwordO);
	mysqli_stmt_fetch($Own);
	
	if ($emailO == $email && $passwordO == $password) {
		// Code for successful login
		echo '<script>window.location="NewsLettersO.php"</script>';
		$N = "SELECT name FROM orphanage WHERE idOrph = ?";
		$Nam = mysqli_prepare($db, $N);
		mysqli_stmt_bind_param($Nam, "s", $idOrph);
		mysqli_stmt_execute($Nam);
		mysqli_stmt_bind_result($Nam, $nameOrph);
		mysqli_stmt_fetch($Nam);
	
		$_SESSION["emailO"] = $email;
		$_SESSION["passwordO"] = $password;
		$_SESSION["idOrph"] = $idOrph;
		$_SESSION["nameOrph"] = $nameOrph;
		$_SESSION["nameO"] = $nameO;
		$_SESSION["phoneO"] = $phoneO;
		$_SESSION["addressO"] = $addressO;
	}
	
	if($Owner[4] == "$email" && $Owner[5] == "$password")
	{
		echo '<script>window.location="NewsLettersO.php"</script>';
		$N="SELECT name FROM orphanage 
			WHERE  idOrph ='$Owner[0]'";
		$Nam=mysqli_query($db,$N);
		$NameO=mysqli_fetch_array($Nam);
		$_SESSION["emailO"]="$email";
		$_SESSION["passwordO"]="$password";
		$_SESSION["idOrph"]=$Owner[0];
		$_SESSION["nameOrph"]=$NameO[0];
		$_SESSION["nameO"]=$Owner[1];
		$_SESSION["phoneO"]=$Owner[2];
		$_SESSION["addressO"]=$Owner[3];
	}
	echo '<script>window.alert("E-mail OR PASSWORD NOT Correct , Please try again .")</script>';
	echo '<script>window.location="JoinUS.html"</script>';
    mysqli_close($db);
	?>
</body>
</html>