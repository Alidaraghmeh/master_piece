<?php
	session_start();
	if(!isset($_SESSION['emailM']) || !isset($_SESSION['passwordM']))
	{
		echo '<script>window.alert("Oooh! Sorry, You must sign in before entering this page")</script>';
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
							<li class="fir"><a href='Users.php'><span>Users</span></a></li>
							<li class="active"><a href='Orphanages.php'><span>Orphanages</span></a></li>
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
						<span class="CreateBut"><a href='AddOrph.php'> <i class='fa fa-plus-circle'></i> New Orphanage </a></span>
						<h3 class="title">Orphanages</h3>
						<?php
						include("dbCon.php");
						$O = "SELECT * FROM orphanage";
						$Or = mysqli_query($db, $O);
						if(mysqli_num_rows($Or) == 0)
						{
							print("
							<div class='part1'>
								<p>
									There are no Orphanages.
								</p>
							</div>
							");
						}
						else
						{
							while($Orph = mysqli_fetch_array($Or))
							{
								print("
								<div class='part1'>
									<span class='CreateBut'>
										<a href='AddSuper.php?idOrph=$Orph[0]&nameOrph=$Orph[1]' title='Add Supervisor'><i class='fa fa-plus-circle' style='font-size:25px;'></i></a> |
										<a href='DeleteOrph.php?idOrph=$Orph[0]&nameOrph=$Orph[1]' title='Delete Orphanage' onclick='return checkDel(this)'><i class='fa fa-trash-o' style='font-size:25px;'></i></a>
									</span>
									<h3>$Orph[1]</h3>
									<table class='Volun'>
											<tr class='headT'>
												<td>Name</td><td>Phone</td><td>Address</td><td>Email</td><td></td>
											</tr>
								");
								$OA = "SELECT * FROM orphanageadmin WHERE idOrph='$Orph[0]'";
								$OrA = mysqli_query($db, $OA);
								if(mysqli_num_rows($OrA) == 0)
								{
									print("
										<tr class='bodyT'>
											<td colspan='5' style='padding:10px;'>There are no Supervisors for this Orphanage.</td>
										</tr>
									</table>
								</div>
									");
								}
								else
								{
									while($OrphA = mysqli_fetch_array($OrA))
									{
										print("
										<tr class='bodyT'>
											<form action='DeleteAdmin.php' method='post' class='form' onsubmit='return check(this)'>
												<input type='hidden' name='idOrph' value='$Orph[0]' />
												<input type='hidden' name='nameOrph' value='$Orph[1]' />
												<input type='hidden' name='email' value='$OrphA[4]' />
												<td>$OrphA[1]</td><td>$OrphA[2]</td><td>$OrphA[3]</td><td>$OrphA[4]</td>
												<td><input type='submit' value='Delete'/></td>
											</form>
										</tr>
										");
									}
									print("
									</table>
								</div>
									");
								}
							}
						}
						mysqli_close($db);
						?>
						<br><br>
						<script type="text/javascript">
						function check()
						{
							return confirm('Are you sure you want to DELETE this User?');
						}
						function checkDel()
						{
							return confirm('Are you sure you want to DELETE this Orphanage?');
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
