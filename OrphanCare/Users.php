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
						<td>
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
							<li class="fir active"><a href='Users.php'><span>Users</span></a></li>
							<li><a href='Orphanages.php'><span>Orphanages</span></a></li>
							<li><a href='RequestsM.php'>
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
						<h3 class="title">All Users</h3>
						<div class='part1'>
							<?php
							include("dbCon.php");
							$U="SELECT * FROM users";
							$Use=mysqli_query($db,$U);
							if(mysqli_num_rows($Use) == 0)
							{
								print("
									<p>
										There are no Users .
									</p>
								");
							}
							else
							{
								print("
									<table class='Volun'>
										<tr class='headT'>
											<td>Name</td><td>National ID</td><td>Email</td><td>Age</td><td>Gender</td><td>Volunteer?</td><td></td>
										</tr>
								");
								while($User=mysqli_fetch_array($Use))
								{
									print("
										<tr class='bodyT'>
											<form action='DeleteUsers.php' method='post' class='form' onsubmit='return check(this)'>
												<input type='hidden' name='NID' value='$User[1]' />
												<input type='hidden' name='email' value='$User[6]' />
												<input type='hidden' name='name' value='$User[0]' />
												<td>$User[0]</td><td>$User[1]</td><td>$User[6]</td><td>$User[3]</td><td>$User[4]</td><td>$User[8]</td>
												<td><input type='submit' value='Delete'/></td>
											</form>
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
							<script type="text/javascript">
							function check()
							{
								return confirm('Are you sure to DELETE this User?');
							}
							</script>
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
