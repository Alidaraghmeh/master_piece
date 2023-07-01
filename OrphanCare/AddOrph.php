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
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
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
						<span class="CreateBut"><a href='Orphanages.php'> <i class='fa fa-arrow-left'></i> Back </a></span>
						<h3 class="title"><i class='fa fa-plus-circle'></i> Orphanage</h3>
						<div class='part1'>
							<?php
							include("dbCon.php");
							print("
							<form action='AddOrphanage.php' method='post' class='form'>
								<p>ID</p>
								<input type='text' name='idOrph' pattern='[0-9]{5}' maxlength='5' placeholder='At Most 5 Numbers' required />
								<p>Name</p>
								<input type='text' name='name' required />
								<p>Phone</p>
								<input type='text' name='phone' pattern='[0-9]{10}' maxlength='10' required />
								<p>Location</p>
								<input type='text' name='location' placeholder='https://goo.gl/maps/?????' required />
								<input type='submit' value='Add'/>
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
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}
		function validatePassword(){
			var pass2=document.getElementById("password2").value;
			var pass1=document.getElementById("password1").value;
			if(pass1!=pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			if(pass1.length < 6)
				document.getElementById("password1").setCustomValidity("Password atlest 6 Characters");
			else
				document.getElementById("password1").setCustomValidity('');
		}
</script>
