<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
	{
		echo '<script>window.alert("Oooh! Sorry, You must SignIn before entering this page")</script>';
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
	<link href="//fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
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
						<li class="active"><a href='EventU.php'><span>Events</span></a></li>
						<li><a href='RequestsU.php'>
							<span>Requests</span>
							<?php 
							if($volunteerNotificationsU != false) {?>
								<span class="notification-number"><?php echo $volunteerNotificationsU;?></span>
							<?php }?>
						</a></li>
						<li><a href='NewsLettersU.php'>
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
					<span class="CreateBut"><a href='EventU.php'> <i class='fa fa-arrow-left'></i> Back </a></span>
					<h3 class="title"><i class='fa fa-plus-circle'></i> Volunteers</h3>
					<div class='part1'>
						<?php
						$emailU=$_SESSION["emailU"];
						$nameU=$_SESSION["nameU"];
						include("dbCon.php");
						if(isset($_GET["idEvent"]))
						{
							$idEvent = $_GET["idEvent"];
							$nameEvent = $_GET["nameEvent"];
							$timeEvent = $_GET["timeEvent"];
							print("<h4>Event Name: $nameEvent .</h4>");
							$V="SELECT * FROM users WHERE volunteer='Volunteer' AND ATime='$timeEvent' AND email!='$emailU'";
							$Vo=mysqli_query($db,$V);
							if(mysqli_num_rows($Vo) == 0)
							{
								print("
									<p>
										There are no volunteers Available.
									</p>
								");
							}
							else
							{
								print("
									<table class='Volun'>
										<tr class='headT'>
											<td>Name</td><td>National ID</td><td>Email</td><td>Age</td><td>Gender</td><td></td>
										</tr>
								");
								while($Vol=mysqli_fetch_array($Vo))
								{
									$Re="SELECT * FROM requestsvol WHERE idEvent='$idEvent' AND email='$Vol[6]'";
									$Req=mysqli_query($db,$Re);
									$Re1="SELECT * FROM volunteers WHERE idEvent='$idEvent' AND emailV='$Vol[6]'";
									$Req1=mysqli_query($db,$Re1);
									if(mysqli_num_rows($Req) > 0 || mysqli_num_rows($Req1) > 0)
									{
										continue;
									}
									else
									{
										print("
											<tr class='bodyT'>
												<form action='RequestVol.php' method='post' class='form'>
													<input type='hidden' name='emailU' value='$emailU' />
													<input type='hidden' name='nameU' value='$nameU' />
													<input type='hidden' name='idEvent' value='$idEvent' />
													<input type='hidden' name='nameEvent' value='$nameEvent' />
													<input type='hidden' name='timeEvent' value='$timeEvent' />
													<input type='hidden' name='email' value='$Vol[6]' />
													<input type='hidden' name='name' value='$Vol[0]' />
													<td>$Vol[0]</td><td>$Vol[1]</td><td>$Vol[6]</td><td>$Vol[3]</td><td>$Vol[4]</td>
													<td><input type='submit' value='Send Request'/></td>
												</form>
											</tr>
										");
									}
								}
								print("
										<tr class='bodyT'>
											<td colspan='6' style='padding:10px;'>No other volunteers are available.</td>
										</tr>
									</table>
								");
							}
						}
						mysqli_close($db);
						?>
						<br><br>
					</div>
				</div>
			</div>
		</section>
		<div class="footer">
	        <table>
	          	<tr>
	            	<td></td>
	            	<td></td>
	            	<td><p style="float:left;"> &copy 2019 - OrphanCare. All rights reserved. </p></td>
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
	</body>
</html>
