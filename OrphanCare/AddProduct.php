<?php
	session_start();
	if(!isset($_SESSION['emailO']) || !isset($_SESSION['passwordO']))
	{
		echo '<script>window.alert("Oooh! Sorry , You must SignIn before entered this page")</script>';
		echo '<script>window.location="JoinUS.html"</script>';
	}
	$newsletterNotifications = include("newsletterNotifications.php");
	$eventNotifications = include("eventNotifications.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>OrphanCare</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
                                <li><a>Welcome <?php echo $_SESSION["nameO"];?></a></li>
                            </ul>
                        </td>
						<td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td>
							<ul>
								<li><a title='Name Orphanage'><?php echo $_SESSION["nameOrph"];?></a></li>
							</ul>
						</td>
                    </tr>
                </table>
            </div>
            <div class="content">
				<div class="viewContent">
					<div id='cssmenu'>
						<ul>
							<li class="fir"><a href='Supervisors.php'><span>Supervisors</span></a></li>
							<li class="active"><a href='product.php'><span>Products for Sale</span></a></li>
							<li><a href='sales.php'><span>Our Sales</span></a></li>
							<li><a href='Donations.php'><span>Donations</span></a></li>
							<li><a href='EventO.php'><span>Events</span></a></li>
							<li><a href='RequestsO.php'>
								<span>Requests</span>
								<?php
								if($eventNotifications != false) {?>
									<span class="notification-number"><?php echo $eventNotifications;?></span>
								<?php }?>
							</a></li>
							<li><a href='NewsLettersO.php'>
								<span>NewsLetters</span>
								<?php 
								if($newsletterNotifications != false) {?>
									<span class="notification-number"><?php echo $newsletterNotifications;?></span>
								<?php }?>
							</a></li>
							<li class='last'><a href='LogOutO.php'><span>LogOut</span></a></li>
						</ul>
					</div>
					<div class="viewCon">
						<span class="CreateBut"><a href='product.php'> <i class='fa fa-arrow-left'></i> Back </a></span>
						<h3 class="title">New Product</h3>
						<div class='part1'>
							<?php
							$email=$_SESSION["emailO"];
							$idOrph=$_SESSION["idOrph"];
							include("dbCon.php");
							print("
								<form action='AddProductO.php' method='post' class='form' enctype='multipart/form-data'>
									<input type='hidden' name='emailOrph' value='$email' />
									<input type='hidden' name='idOrph' value='$idOrph' />
									<p>Product Image</p>
									<input type='file' class='form-control' name='file' id='file' required>
									<p>Product Name</p>
									<input type='text' name='name' required />
									<p>Description</p>
									<textarea name='description' rows='4' required></textarea>
									<p>Product Price</p>
									<input type='text' name='price' required />
									<p>Product Quantity</p>
									<input type='text' name='quantity' required />
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
