<?php
session_start();
if (!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM'])) {
    echo '<script>window.alert("Oooh! Sorry, You must sign in before entering this page")</script>';
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

if (isset($_GET["idOrph"]) && isset($_GET["nameOrph"])) {
    $idOrph = $_GET["idOrph"];
    $nameOrph = $_GET["nameOrph"];
    $q1 = "DELETE FROM `orphanage` WHERE `idOrph` ='$idOrph' AND name='$nameOrph';";
    if (mysqli_query($db, $q1)) {
        $q2 = "DELETE FROM `orphanageadmin` WHERE `idOrph` ='$idOrph';";
        if (mysqli_query($db, $q2)) {
            echo "<script>window.alert('The Orphanage $nameOrph has been Deleted.')</script>";
            echo "<script>window.location='Orphanages.php'</script>";
        } else {
            echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
            echo "<script>window.location='Orphanages.php'</script>";
        }
    } else {
        echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
        echo "<script>window.location='Orphanages.php'</script>";
    }
}
mysqli_close($db);
?>
</body>
</html>
