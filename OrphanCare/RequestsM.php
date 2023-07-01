<?php
	session_start();
	if(!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	$eventNotifications = include("eventNotificationsM.php");
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
                            <ul>
                                <li><a>Welcome <?php echo $_SESSION["nameM"];?></a></li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="content">
				<div class="viewContent">
					<div id='cssmenu'>
						<ul>
							<li class="fir"><a href='Users.php'><span>Users</span></a></li>
							<li><a href='Orphanages.php'><span>Orphanages</span></a></li>
							<li class="active"><a href='RequestsM.php'>
								<span>Requests</span>
								<?php
								if($eventNotifications != false) {?>
									<span class="notification-number"><?php echo $eventNotifications;?></span>
								<?php }?>
							</a></li>
							<li><a href='NewsLettersM.php'><span>NewsLetters</span></a></li>
							<li class='last'><a href='LogOutM.php'><span>LogOut</span></a></li>
						</ul>
					</div>
					<div class="viewCon">
						<h3 class="title">The Requests</h3>
						<?php
						include("dbCon.php");
						$UP="UPDATE `requestmstry` SET `status`='1'";
						mysqli_query($db,$UP);
						
						$Re="SELECT * FROM requestmstry";
						$Req=mysqli_query($db,$Re);
						if(mysqli_num_rows($Req) == 0)
						{
							print("
							<div class='part2'>
								<p>
									There are no Requests .
								</p>
							</div>
							");
						}
						else
						{
							while($Request=mysqli_fetch_array($Req))
							{
								print("
								<div class='part2'>
									<h3> $Request[3] </h3>
									<small>Date : $Request[4] | From : $Request[6] | In : $Request[7] .</small><br>
									<small>Type :$Request[8] | Orphanage : $Request[11] .</small>
									<p>
										$Request[9]
									</p>
									<h5>The Request From : $Request[1] | $Request[2] .</h5>
									<form action='AcceptMinistry.php' method='post' class='form'>
										<input type='hidden' name='idEvent' value='$Request[0]' />
										<input type='submit' name='submit' value='Accept'/>
										<input type='submit' name='submit' value='Decline'/>
									</form>
									<br>
								</div>
								");
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
