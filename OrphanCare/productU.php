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
							<li class="active"><a href='productU.php'><span>Products for Sale</span></a></li>
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
						<h3 class="title">Products</h3>
						<div class='part1'>
							<?php
							$emailU = $_SESSION["emailU"];
							$nameU = $_SESSION["nameU"];
							$phoneU = $_SESSION["phoneU"];
							include("dbCon.php");
							$Pr="SELECT * FROM `products` WHERE `quantity` > 0 ORDER BY id DESC";
							$Pro=mysqli_query($db,$Pr);
							if(mysqli_num_rows($Pro) == 0)
							{
								print("
									<p>
										There are no Products.
									</p>
								");
							}
							else
							{
								print("
									<div class='equal-height mt-3'>
									  <div class='row'>
								");
								while($Product=mysqli_fetch_array($Pro)) {
									print("
										<div class='col-md-6 mb-3'>
										  <div class='card'>
											<img class='card-img-top' src='UploadImages/$Product[3]' alt='Card image cap' style='height: 300px;'>
											<div class='card-body'>
											  <h5 class='card-title'><em>$Product[4]</em></h5>
											  <p class='card-text'>$Product[5]</p>
											  <p class='card-text'>Price: $Product[6]</p>
											  <p class='card-text'>Quantity: $Product[7]</p>
											  <hr>
											  <form action='puyProduct.php' method='post' class='form'>
												<input type='hidden' name='buyerEmail' value='$emailU'>
												<input type='hidden' name='buyerName' value='$nameU'>
												<input type='hidden' name='buyerPhone' value='$phoneU'>
												<input type='hidden' name='idOrph' value='$Product[1]'>
												<input type='hidden' name='idProduct' value='$Product[0]'>
												<input type='hidden' name='nameProduct' value='$Product[4]'>
												<input type='hidden' name='priceProduct' value='$Product[6]'>
												<input type='hidden' name='oldQuantity' value='$Product[7]'>
												<p>Accepted Cards</p>
												<div class='icon-container'>
													<i class='fab fa-cc-visa' style='color:navy;'></i>
													<i class='fab fa-cc-amex' style='color:blue;'></i>
													<i class='fab fa-cc-mastercard' style='color:red;'></i>
													<i class='fab fa-cc-discover' style='color:orange;'></i>
												</div>
												<p for='cname'>Name on Card</p>
												<input type='text' id='cname' name='cardname' placeholder='John More Doe' required />
												<p for='ccnum'>Credit card number</p>
												<input type='text' id='ccnum' name='cardnumber' placeholder='1111-2222-3333-4444' required />
												<p for='expmonth'>Exp Month</p>
												<input type='number' id='expmonth' name='expmonth' min='0' max='12' placeholder='04' required />
												<p for='expyear'>Exp Year</p>
												<input type='number' id='expyear' name='expyear' min='0' max='99' placeholder='20' required />
												<p for='cvv'>CVV</p>
												<input type='number' id='cvv' name='cvv' min='0' max='999' placeholder='352' required />
												<p>Quantity</p>
												<input type='number' name='quantityProduct' min='0' max='$Product[7]' required>
												<input type='submit' value='Buy'>
											  </form>
											</div>
										  </div>
										</div>
									");
								}
								print("
									  </div>
									</div>
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
