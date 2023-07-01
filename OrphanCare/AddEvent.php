<?php
	session_start();
	if(!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU']))
	{
		echo '<script>window.alert("Oooh! Sorry, You must SignIn before entering this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
		exit();
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
						<h3 class="title">Create Event</h3>
						<div class='part1'>
							<?php
							$emailU = $_SESSION["emailU"];
							$nameU = $_SESSION["nameU"];
							include("dbCon.php");

							// Prepare a SELECT query for orphanages
							$orphanageQuery = "SELECT idOrph, name FROM orphanage";
							$orphanageStmt = mysqli_prepare($db, $orphanageQuery);
							mysqli_stmt_execute($orphanageStmt);
							mysqli_stmt_bind_result($orphanageStmt, $idOrph, $orphanageName);

							print("
								<form action='AddEventU.php' method='post' class='form'>
									<input type='hidden' name='emailU' value='$emailU' />
									<input type='hidden' name='nameU' value='$nameU' />
									<p>Event Name</p>
									<input type='text' name='nameEvent' required />
									<p>First Date</p>
									<input type='date' name='fDate' required />
									<p>Second Date</p>
									<input type='date' name='sDate' required />
									<p>Third Date</p>
									<input type='date' name='tDate' required />
									<p>Event Time</p>
									<select name='timeEvent' required/>
										<option value='Morning'>Morning</option>
										<option value='Afternoon'>Afternoon</option>
										<option value='Evening'>Evening</option>
									</select>
									<input type='text' name='timeEvent1' placeholder='08-10 AM' required />
									<p>Event Address</p>
									<select name='addressEvent' required />
										<option value='Amman'>Amman</option>
										<option value='Irbid'>Irbid</option>
										<option value='Zarqa'>Zarqa</option>
										<option value='Salt'>Salt</option>
										<option value='Madaba'>Madaba</option>
										<option value='Aqaba'>Aqaba</option>
										<option value='Mafraq'>Mafraq</option>
										<option value='Jerash'>Jerash</option>
										<option value='Al Karak'>Al Karak</option>
										<option value='Ajlon'>Ajlon</option>
										<option value='Maan'>Maan</option>
										<option value='Ramtha'>Ramtha</option>
										<option value='Tafila'>Tafila</option>
										<option value='Sahab'>Sahab</option>
										<option value='Dead Sea'>Dead Sea</option>
									</select>
									<p>Event Type</p>
									<select name='typeEvent' required />
										<option value='Find Raiser'>Find Raiser</option>
										<option value='Meal'>Meal(Breakfast/Lunch/Dinner)</option>
										<option value='Training'>Training</option>
										<option value='Other'>Other</option>
									</select>
									<p>Description</p>
									<textarea name='descriptionEvent' rows='4' required></textarea>
									<p>Choose Orphanage</p>
									<select name='idOrph' required />
										<option value=''>Select one</option>
							");

							// Fetch and print options for orphanages
							while (mysqli_stmt_fetch($orphanageStmt)) {
								echo "<option value='$idOrph'>$orphanageName</option>";
							}

							print("
									</select>
									<input type='submit' value='Create'/>
									<input type='reset' value='Reset' />
								</form>
							");

							// Close statement and database connection
							mysqli_stmt_close($orphanageStmt);
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
