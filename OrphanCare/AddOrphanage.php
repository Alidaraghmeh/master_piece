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

$OA = "SELECT * FROM orphanage WHERE idOrph='$idOrph'";
$OrA = mysqli_query($db, $OA);
if (mysqli_num_rows($OrA) > 0) {
    echo "<script>window.alert('ID already exists, please change it')</script>";
    echo '<script>window.location="AddOrph.php"</script>';
    exit;
} else {
    $q = "INSERT INTO orphanage (idOrph, name, phone, location) 
			VALUES ('$idOrph', '$name', '$phone', '$location')";
    if (mysqli_query($db, $q)) {
        echo "<script>window.alert('Orphanage $name has been added.')</script>";
        echo "<script>window.location='AddOrph.php'</script>";
    } else {
        echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
        echo "<script>window.location='AddOrph.php'</script>";
    }
}

mysqli_close($db);
?>
</body>
</html>
