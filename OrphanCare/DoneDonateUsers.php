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

$O = "SELECT name FROM orphanage 
    WHERE idOrph='$orphanage'";
$Orph = mysqli_query($db, $O);
$nameOrphanage = mysqli_fetch_array($Orph);
$q = "INSERT INTO `donates`(`name`, `NID`, `phone`, `email`, `idOrphanage`, `nameOrphanage`, `cardname`, `cardnumber`, `amount`)
        VALUES ('$name','$NID','$phone','$email','$orphanage','$nameOrphanage[0]','$cardname','$cardnumber','$amount')";
if (mysqli_query($db, $q)) {
    echo '<script>window.alert("Thank you for your donation ❤")</script>';
    echo '<script>window.location="DonateUsers.php"</script>';
} else {
    echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
    echo '<script>window.location="DonateUsers.php"</script>';
}
mysqli_close($db);
?>
</body>
</html>
