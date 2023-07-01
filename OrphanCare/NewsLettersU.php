<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	$newsletterNotificationsU = include("newsletterNotificationsU.php");
	$volunteerNotificationsU = include("volunteerNotificationsU.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>OrphanCare</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<style>
	</style>
</head>
<body>
	<section class="fill-height-or-more">
		<div class="header nav-bar">
			<table>
				<tr>
					<td><img src="images/logo.png" width="auto" height="70" style="margin-left:50px;"></td>
					<td></td><td></td><td></td><td></td><td></td><td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td>
					<td></td><td></td><td></td>
					<td>
						<ul>
							<li><a>Welcome <?php echo $_SESSION["nameU"];?></a></li>
						</ul>
					</td>
					<td></td><td></td><td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td>
					<td><a href="DonateUsers.php"><button class="donate-button">DONATE</button></a></td>
				</tr>
			</table>
		</div>
		<div class="content">
			<div class="viewContent">
				<div id='cssmenu'>
					<ul>
						<li class="fir"><a href='InfoU.php'><span>Personal Info</span></a></li>
						<li><a href='productU.php'><span>Products for Sale</span></a></li>
						<li><a href='purchases.php'><span>Purchases</span></a></li>
						<li><a href='EventU.php'><span>Events</span></a></li>
						<li><a href='RequestsU.php'>
							<span>Requests</span>
							<?php 
							if($volunteerNotificationsU != false) {?>
								<span class="notification-number"><?php echo $volunteerNotificationsU;?></span>
							<?php }?>
						</a></li>
						<li class="active"><a href='NewsLettersU.php'>
							<span>NewsLetters</span>
							<?php 
							if($newsletterNotificationsU != false) {?>
								<span class="notification-number"><?php echo $newsletterNotificationsU;?></span>
							<?php }?>
						</a></li>
						<li class='last'><a href='LogOutU.php'><span>LogOut</span></a></li>
					</ul>
				</div>
				<div class="viewCon">
					<h3 class="title">NewsLetters</h3>
					<?php
					$NIDU = $_SESSION["NIDU"];
					include("dbCon.php");
					$OS = "SELECT orphanStatus FROM newsletters";
					$OldS = mysqli_query($db, $OS);
					while($OldStatus = mysqli_fetch_array($OldS)) {
						$newStatus = $NIDU . " - " . $OldStatus[0];
						$UP = "UPDATE `newsletters` SET `orphanStatus`='$newStatus' WHERE `orphanStatus` NOT LIKE '%$NIDU%'";
						mysqli_query($db, $UP);
					}

					$N = "SELECT * FROM newsletters";
					$News = mysqli_query($db, $N);
					if(mysqli_num_rows($News) == 0) {
						echo "
						<div class='part2'>
							<p>
								There are no NewsLetters.
							</p>
						</div>
						";
					} else {
						while($NewsLetters = mysqli_fetch_array($News)) {
							echo "
							<div class='part2'>
								<h3>$NewsLetters[1]</h3>
								<small>Posted in $NewsLetters[2]</small>
								<p>
									$NewsLetters[3]
								</p>
							</div>
							";
						}
					}
					mysqli_close($db);
					?>
				</div>
			</div>
		</div>
		<div class="footer">
			<table>
				<tr>
					<td></td>
					<td></td>
					<td><p style="float:left;"> &copy; 2019 - OrphanCare. All rights reserved. </p></td>
					<td><p style="text-align: center;"><img src="images/logo.png" width="auto" height="70" style="border-radius: 10%;"></p></td>
					<td>
						<ul class="links">
							<li><a href="http://www.facebook.com"><i class="fab fa-facebook-f" class="icons"></i></a></li>
							<li><a href="http://www.twitter.com/"><i class="fab fa-twitter" class="icons"></i></a></li>
							<li><a href="http://www.linkedin.com/"><i class="fab fa-linkedin" class="icons"></i></a></li>
							<li><a href="http://www.pinterest.com/"><i class="fab fa-instagram" class="icons"></i></a></li>
							<li><a href="https://plus.google.com"><i class="fab fa-google-plus" class="icons"></i></a></li>
						</ul>
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	</section>
</body>
</html>
