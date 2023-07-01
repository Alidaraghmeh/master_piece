<?php
  extract($_POST);
  include('dbCon.php');

  $q= "INSERT INTO `contact` (`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$msg')";
  if(mysqli_query($db,$q)) {
    echo "<script>window.alert('Your message has been sent')</script>";
    echo '<script>window.location="contact.html"</script>';
  }
  else {
    echo '<script>window.alert("Sorry an error is occur , please try again.")</script>';
    echo '<script>window.location="contact.html"</script>';
  }
  mysqli_close($db);
?>
