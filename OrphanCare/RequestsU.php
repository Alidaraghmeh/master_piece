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
							<li class="active"><a href='RequestsU.php'>
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
						<h3 class="title">The Requests</h3>
						<?php
						$emailU = $_SESSION["emailU"];
						$nameU = $_SESSION["nameU"];
						include("dbCon.php");
						$UP = "UPDATE `requestsvol` SET `status`='1' WHERE `email` = '$emailU'";
						mysqli_query($db, $UP);
						
						$Re = "SELECT * FROM requestsvol WHERE email='$emailU'";
						$Req = mysqli_query($db, $Re);
						if(mysqli_num_rows($Req) == 0)
						{
							print("
							<div class='part2'>
								<p>
									There are no Requests.
								</p>
							</div>
							");
						}
						else
						{
							while($Request = mysqli_fetch_array($Req))
							{
								$E = "SELECT * FROM events WHERE idEvent='$Request[2]' ORDER BY `events`.`idEvent` DESC";
								$Eve = mysqli_query($db, $E);
								if(mysqli_num_rows($Eve) == 0)
								{
									print("
									<div class='part2'>
										<p>
											There are no Events.
										</p>
									</div>
									");
								}
								else
								{
									while($Event = mysqli_fetch_array($Eve))
									{
										print("
										<div class='part2'>
											<h3> $Event[3] </h3>
											<small>Date: $Event[4] | From: $Event[6] | In: $Event[7].</small><br>
											<small>Type: $Event[8] | Orphanage: $Event[11].</small>
											<p>
												$Event[9]
											</p>
										");
										$V = "SELECT * FROM volunteers WHERE idEvent='$Event[0]'";
										$Vo = mysqli_query($db, $V);
										if(mysqli_num_rows($Vo) == 0)
										{
											print("
												<ol>
													There are no volunteers until now.
												</ol>
											");
										}
										else
										{
											print("
												<ol>
													The volunteers in this event are: <br>
											");
											while($Vol = mysqli_fetch_array($Vo))
											{
												print("
													<li> $Vol[1] / $Vol[2]</li>
												");
											}
											print("
												</ol>
											");
										}
										print("
											<h5>The Request From $Request[0] | $Request[1].</h5>
											<form action='AcceptVol.php' method='post' class='form'>
												<input type='hidden' name='emailV' value='$emailU' />
												<input type='hidden' name='nameV' value='$nameU' />
												<input type='hidden' name='idEvent' value='$Request[2]' />
												<input type='submit' name='submit' value='Accept'/>
												<input type='submit' name='submit' value='Decline'/>
											</form>
											<br>
										</div>
										");
									}
								}
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
			            <td><p style="float:left;"> &copy 2023 - OrphanCare. All rights reserved. </p></td>
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
