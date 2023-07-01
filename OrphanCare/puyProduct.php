<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
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
	
	$total = $priceProduct * $quantityProduct;
	
	$q= "INSERT INTO `sales`(`idOrph`, `idProduct`, `nameProduct`, `priceProduct`, `quantityProduct`, `buyerEmail`, `buyerName`, `buyerPhone`, `cardname`, `cardnumber`, `total`) 
					VALUES ('$idOrph','$idProduct','$nameProduct','$priceProduct','$quantityProduct','$buyerEmail','$buyerName','$buyerPhone','$cardname','$cardnumber','$total')";
	if(mysqli_query($db,$q)) {
		$newQuantity = $oldQuantity - $quantityProduct;
		$UP="UPDATE `products` SET `quantity`='$newQuantity' WHERE `idOrph` = '$idOrph' AND `id` = '$idProduct'";
		mysqli_query($db,$UP);
		echo '<script>window.alert("This product has been successfully purchased.")</script>';
		echo '<script>window.location="productU.php"</script>';
	}
	else {
		echo "<script>window.alert(' Sorry an error is occur , please try again ')</script>";
		echo '<script>window.location="productU.php"</script>';
	}
	mysqli_close($db);
	?>
</body>
</html>