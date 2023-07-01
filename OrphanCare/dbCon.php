<?php
$db = new mysqli("localhost", "root", "", "orphan");
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}

$O = "SELECT name FROM orphanage WHERE idOrph='$idOrph'";
$Orph = $db->query($O);
$nameOrphanage = $Orph->fetch_array();

$q = "INSERT INTO `requestorph` ( `emailU`, `nameU`, `nameEvent`, `fDate`, `sDate`, `tDate`, `timeEvent`, `timeEvent1`, `addressEvent`, `typeEvent`, `descriptionEvent`, `idOrph`, `nameOrph`) 
    VALUES ('$emailU','$nameU','$nameEvent','$fDate','$sDate','$tDate','$timeEvent','$timeEvent1','$addressEvent','$typeEvent','$descriptionEvent','$idOrph','$nameOrphanage[0]')";
if ($db->query($q)) {
    echo '<script>window.location="EventU.php"</script>';
} else {
    echo "<script>window.alert('Sorry, an error occurred. Please try again.')</script>";
    echo '<script>window.location="EventU.php"</script>';
}

$db->close();
?>
