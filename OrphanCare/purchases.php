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
        <link href="//fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
							<li class="active"><a href='purchases.php'><span>Purchases</span></a></li>
							<li><a href='EventU.php'><span>Events</span></a></li>
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
						<h3 class="title">Purchases</h3>
						<div class='part1'>
							<?php
							$emailU = $_SESSION["emailU"];
							$nameU = $_SESSION["nameU"];
							$phoneU = $_SESSION["phoneU"];
							include("dbCon.php");
							$O="SELECT * FROM sales WHERE buyerEmail='$emailU' ORDER BY id DESC";
							$Or=mysqli_query($db,$O);
							if(mysqli_num_rows($Or) == 0)
							{
								print("
									<p>
										There are no sales.
									</p>
								");
							}
							else
							{
								print("
									<table class='Volun'>
										<tr class='headT'>
											<td>Product Name</td><td>Product Price</td><td>Product Quantity</td><td>Total</td>
										</tr>
								");
								while($Orph=mysqli_fetch_array($Or))
								{
									print("
										<tr class='bodyT1'>
											<td>$Orph[3]</td><td>$Orph[4]</td><td>$Orph[5]</td><td>$Orph[11]</td>
										</tr>
									");
								}
								print("
									</table>
								");
							}
							mysqli_close($db);
							?>
							<br><br>
						</div>
					</div>
				</div>
            </div>
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
        </section>
    </body>
</html>
<script type="text/javascript">
		window.onload = function () {
			document.getElementById("yes").onchange = YesVolunteer;
			document.getElementById("no").onchange = NoVolunteer;
		}
		function YesVolunteer(){
			document.getElementById('Available').disabled = false;
			document.getElementById('Available').selectedIndex = 0;
		}
		function NoVolunteer(){
			document.getElementById('Available').disabled = true;
			document.getElementById('Available').selectedIndex = 1;
		}
</script>
