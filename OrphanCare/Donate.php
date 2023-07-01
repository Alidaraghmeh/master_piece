<!DOCTYPE html>
<html>
<head>
    <title>OrphanCare</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
    <link href="//fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.9.1.min.js"></script>
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
                            <li><a href="index.html">Home</a></li>
                            <li><a href="AboutUs.html">About Us</a></li>
                            <li><a href="Events.php">Events</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="JoinUS.html">Join US</a></li>
                        </ul>
                    </td>
                    <td><a href="Donate.php"><button class="donate-button">DONATE</button></a></td>
                </tr>
            </table>
        </div>
        <div class="content">
            <div class="mainContent">
                <div class="part1">
                    <h3>1 - Donate Online :</h3>
                    <form action="DoneDonate.php" method="post" class="form">
                        <p>Full Name</p>
                        <input type="text" name="name" required />
                        <p>National ID</p>
                        <input type="text" name="NID" pattern="[0-9]{10}" maxlength="10" required />
                        <p>Phone</p>
                        <input type="text" name="phone" pattern="[0-9]{10}" maxlength="10" required />
                        <p>Email</p>
                        <input type="email" name="email" required />
                        <p>Choose Orphanage</p>
                        <select name='orphanage' required />
                            <option value=''>Select one</option>
                            <?php
                            include("dbCon.php");
                            $O = "SELECT idOrph, name FROM orphanage";
                            $Orph = mysqli_query($db, $O);
                            while ($Orphanage = mysqli_fetch_array($Orph)) {
                                print("<option value='$Orphanage[0]'>$Orphanage[1]</option>");
                            }
                            mysqli_close($db);
                            ?>
                        </select>
                        <h3>Payment</h3>
                        <p>Accepted Cards</p>
                        <div class="icon-container">
                            <i class="fab fa-cc-visa" style="color:navy;"></i>
                            <i class="fab fa-cc-amex" style="color:blue;"></i>
                            <i class="fab fa-cc-mastercard" style="color:red;"></i>
                            <i class="fab fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <p for="cname">Name on Card</p>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe" required />
                        <p for="ccnum">Credit card number</p>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required />
                        <p for="expmonth">Exp Month</p>
                        <input type="number" id="expmonth" name="expmonth" min="0" max="12" placeholder="04" required />
                        <div class="row">
                            <div class="col-50">
                                <p for="expyear">Exp Year</p>
                                <input type="number" id="expyear" name="expyear" min="0" max="99" placeholder="20" required />
                            </div>
                            <div class="col-50">
                                <p for="cvv">CVV</p>
                                <input type="number" id="cvv" name="cvv" min="0" max="999" placeholder="352" required />
                            </div>
                        </div>
                        <p>The Amount</p>
                        <input type="text" name="amount" required /><br>
                        <input type="submit" value="Donate"/>
                        <input type="reset" value="Reset" />
                    </form>
                </div>
                <div class="part2">
                    <h3>2 - Donate In-Person :</h3>
                    <p>
                        You can donate by going to the orphanage directly or contacting them. <br>
                        The following are our Orphanages:
                        <ol class="donat">
                            <?php
                            include("dbCon.php");
                            $O = "SELECT * FROM orphanage";
                            $Orph = mysqli_query($db, $O);
                            while ($Orphanage = mysqli_fetch_array($Orph)) {
                                print("
                                <li> $Orphanage[1] /
                                    <i class='fa fa-phone'></i> $Orphanage[2] /
                                    <i class='fa fa-map-marker'></i> <a href='$Orphanage[3]' target='_blank'>Go!</a>
                                </li>
                                ");
                            }
                            mysqli_close($db);
                            ?>
                        </ol>
                    </p>
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
<script src="js/easyResponsiveTabs.js"></script>
