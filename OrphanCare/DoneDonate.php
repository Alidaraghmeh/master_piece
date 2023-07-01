<html>
<head>
	<meta charset="utf-8">
	<meta data="utf-8">
</head>
<body>
    <?php 
    extract($_POST);
    include("dbCon.php");
    
    $stmt = $db->prepare("SELECT name FROM orphanage WHERE idOrph = ?");
    $stmt->bind_param("i", $orphanage);
    $stmt->execute();
    $result = $stmt->get_result();
    $nameOrphanage = $result->fetch_assoc();
    
    $query = "INSERT INTO donates (name, NID, phone, email, idOrphanage, nameOrphanage, cardname, cardnumber, amount)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssissss", $name, $NID, $phone, $email, $orphanage, $nameOrphanage['name'], $cardname, $cardnumber, $amount);
    
    if ($stmt->execute()) {
        echo '<script>window.alert("Thank you for your Donate ❤")</script>';
        echo '<script>window.location="Donate.php"</script>';
    } else {
        echo "<script>window.alert(' Sorry an error occurred, please try again ')</script>";
        echo '<script>window.location="Donate.php"</script>';
    }
    
    $stmt->close();
    $db->close();
    ?>
</body>
</html>
