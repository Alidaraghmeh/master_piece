<?php
session_start();
if (!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM'])) {
    echo '<script>window.alert("Oooh! Sorry, You must sign in before entering this page")</script>';
    echo '<script>window.location="JoinUS.html"</script>';
    exit;
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

$OA = "SELECT * FROM orphanageadmin WHERE email='$email'";
$OrA = mysqli_query($db, $OA);
if (mysqli_num_rows($OrA) > 0) {
    echo "<script>window.alert('E-mail already exists, please change it')</script>";
    echo '<script>window.location="AddSuper.php"</script>';
    exit;
} else {
    $q = "INSERT INTO orphanageadmin (idOrph, name, phone, address, email, password) 
			VALUES ('$idOrph', '$name', '$phone', '$address', '$email', '$password')";
    if (mysqli_query($db, $q)) {
        echo "<script>window.alert('$name have been added to the orphanage $nameOrph as supervisor.')</script>";
        echo "<script>window.location='AddSuper.php?idOrph=$idOrph&nameOrph=$nameOrph'</script>";
    } else {
        echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
        echo "<script>window.location='AddSuper.php?idOrph=$idOrph&nameOrph=$nameOrph'</script>";
    }
}

mysqli_close($db);
?>
</body>
</html>
