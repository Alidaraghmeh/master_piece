<?php
session_start();
if (!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM'])) {
    echo '<script>window.alert("Oooh! Sorry, you must sign in before entering this page")</script>';
    echo '<script>window.location="JoinUS.html"</script>';
    exit; // Added exit to stop further script execution
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

date_default_timezone_set("Etc/GMT-3");
$localtime = localtime();
$localtime_assoc = localtime(time(), true);
$datePosted = date("Y/m/d");

$q = "INSERT INTO newsletters (name, datePosted, msg) VALUES ('$name', '$datePosted', '$msg')";

if (mysqli_query($db, $q)) {
    echo "<script>window.alert('Newsletters have been published.')</script>";
    echo "<script>window.location='AddNews.php'</script>";
} else {
    echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
    echo "<script>window.location='AddNews.php'</script>";
}

mysqli_close($db);
?>
</body>
</html>
