<?php
session_start();
if (!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU'])) {
    echo '<script>window.alert("Oooh! Sorry, you must sign in before entering this page")</script>';
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

$c = "SELECT `password` FROM `users` WHERE `email`='$email'";
$cs = mysqli_query($db, $c);
$row = mysqli_fetch_array($cs);
if ($password == $row[0]) {
    $_SESSION["nameU"] = $name;
    $_SESSION["NIDU"] = $NID;
    $_SESSION["phoneU"] = $phone;
    $q1 = "UPDATE `users` SET `name` = '$name' , `NID` = '$NID' ,  `phone` = '$phone' ,
                                `address` = '$address' , `volunteer` = '$volunteer' ,
                                `ATime` = '$ATime' WHERE `email`='$email';";
    if (mysqli_query($db, $q1)) {
        $q2 = "UPDATE `events` SET `nameU` = '$name' WHERE `emailU` = '$email';";
        $q3 = "UPDATE `requestorph` SET `nameU` = '$name' WHERE `emailU` = '$email';";
        $q4 = "UPDATE `requestsvol` SET `nameU` = '$name' WHERE `emailU` = '$email';";
        $q5 = "UPDATE `volunteers` SET `nameV` = '$name' WHERE `emailV` = '$email';";
        if (mysqli_query($db, $q2) && mysqli_query($db, $q3) && mysqli_query($db, $q4) && mysqli_query($db, $q5)) {
            echo "<script>window.alert('Your information has been edited')</script>";
            echo '<script>window.location="InfoU.php"</script>';
        } else {
            echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
            echo '<script>window.location="InfoU.php"</script>';
        }
    } else {
        echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
        echo '<script>window.location="InfoU.php"</script>';
    }
} else {
    echo "<script>window.alert('Password incorrect. Please try again.')</script>";
    echo '<script>window.location="InfoU.php"</script>';
}
mysqli_close($db);
?>
</body>
</html>
