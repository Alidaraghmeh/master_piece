<?php
	session_start();
	if(!isset($_SESSION['emailO']) || !isset($_SESSION['passwordO']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
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
	
	function UploadImage ($path) {
	  // File Properties
	  $file_name  = $path['name'];
	  $file_tmp   = $path['tmp_name'];
	  $file_size  = $path['size'];
	  $file_error = $path['error'];

	  // Working With File Extension
	  $file_ext   = explode('.', $file_name);
	  $file_fname = explode('.', $file_name);

	  $file_fname = strtolower(current($file_fname));
	  $file_ext   = strtolower(end($file_ext));
	  if ($file_error === 0) {
		if ($file_size <= 5000000) {
		  $file_name_new = $file_fname . uniqid('',true) . '.' . $file_ext;
		  $file_name_new = uniqid('',true) . '.' . $file_ext;
		  $file_destination = "UploadImages/" . $file_name_new;
		  if (move_uploaded_file($file_tmp, $file_destination)) {
			return $file_name_new;
		  }
		  else {
			return 10;
		  }
		}
		else {
		  return 20;
		}
	  }
	  else {
		return 30;
	  }
	}
	$res_error = array("Sorry an error is occurred during upload1, please try again","Sorry! File must be less than 5MB","Sorry an error is occurred, please try again");

	$nameFile = UploadImage($_FILES['file']);

	if($nameFile == 10 || $nameFile == 20 || $nameFile == 30) {
	  echo "<script>window.alert('$res_error[$nameFile]')</script>";
	  echo '<script>window.location="AddProduct.php"</script>';
	}
	else {
		$q= "INSERT INTO `products`(`idOrph`, `emailOrph`, `image`, `name`, `description`, `price`, `quantity`) 
							VALUES ('$idOrph','$emailOrph','$nameFile','$name','$description','$price','$quantity')";
		if(mysqli_query($db,$q)) {
			echo "<script>window.alert('The product $name has been added successfully')</script>";
			echo '<script>window.location="AddProduct.php"</script>';
		}
		else {
			echo "<script>window.alert(' Sorry an error is occure , please try agian ')</script>";
			echo '<script>window.location="AddProduct.php"</script>';
		}
    }
  	mysqli_close($db);
	?>
</body>
</html>