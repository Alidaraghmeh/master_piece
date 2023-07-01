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
							<li class="fir active"><a href='InfoU.php'><span>Personal Info</span></a></li>
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
						<h3 class="title">Personal Info</h3>
						<div class='part1'>
							<?php
							$emailU=$_SESSION["emailU"];
							include("dbCon.php");
							$U="SELECT * FROM users WHERE email='$emailU'";
							$Us=mysqli_query($db,$U);
							$User=mysqli_fetch_array($Us);
							print("
								<h4>Email : $User[6] </h4>
								<form action='EditInfoU.php' method='post' class='form'>
									<input type='hidden' name='email' value='$emailU' />
									<p>Full Name</p>
									<input type='text' name='name' value='$User[0]' required />
									<p>National ID</p>
									<input type='text' name='NID' value='$User[1]' pattern='[0-9]{10}' maxlength='10' required />
									<p>Phone</p>
									<input type='text' name='phone' value='$User[2]' pattern='[0-9]{10}' maxlength='10' required />
									<p>Address</p>
									<select name='address' required />
										<option value='$User[5]'>$User[5]</option>
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
									<p>Would you like to Volunteer ?</p>
									&nbsp;&nbsp;&nbsp;&nbsp;
							");
							if($User[8] == "Volunteer")
							{
								print("<input type='radio' name='volunteer' value='Volunteer' id='yes' checked required /> Yes &nbsp;&nbsp; ");
								print("&nbsp;<input type='radio' name='volunteer' value='Non-Volunteer' id='no' required /> No");
							}
							else
							{
								print("<input type='radio' name='volunteer' value='Volunteer' id='yes'  required /> Yes &nbsp;&nbsp;");
								print("&nbsp;<input type='radio' name='volunteer' value='Non-Volunteer' id='no' checked required /> No ");
							}
							print("	<br>
									<p>Available Time</p>
									<select name='ATime' id='Available' />
										<option value='$User[9]'>$User[9]</option>
										<option value=''></option>
										<option value='Morning' id='First'>Morning</option>
										<option value='Afternoon'>Afternoon</option>
										<option value='Evening'>Evening</option>
									</select>
									<p>Enter Password To Edit Your Info</p>
									<input type='password' name='password' required />
									<input type='submit' value='Edit'/>
									<input type='reset' value='Reset' />
								</form>
							");
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
