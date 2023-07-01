<!DOCTYPE html>
<html>
<head>
    <title>OrphanCare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/b45b3d0665.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
                        <li><a class="active" href="Events.php">Events</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="JoinUS.html">Join US</a></li>
                    </ul>
                </td>
                <td><a href="Donate.php"><button class="donate-button">DONATE</button></a></td>
            </tr>
        </table>
    </div>
    <div class="content">
        <div class="viewCon1">
            <div class="container">
                <h3 class="title">Our Events</h3>
                <div class="row">
                    <?php
                    include("dbCon.php");
                    $E = "SELECT * FROM events ORDER BY `idEvent` DESC";
                    $Eve = mysqli_query($db, $E);
                    if (mysqli_num_rows($Eve) == 0) {
                        print("
                        <div class='part2'>
                            <p>
                                There are no Events yet.
                            </p>
                        </div>
                        ");
                    } else {
                        while ($Event = mysqli_fetch_array($Eve)) {?>
                            <div class="col-md-6">
                                <div class="card part2">
                                    <h5 class="card-header"><?php echo $Event[3]; ?> </h5>
                                    <div class="card-body mt-2">
                                        <small>
                                            <i class="far fa-calendar-alt"></i> <?php echo $Event[4];?>
                                            | <i class="far fa-clock"></i> <?php echo $Event[6];?>
                                            | <i class="fas fa-map-marker"></i> <?php echo $Event[7];?>
                                        </small><br>
                                        <small>
                                            Type: <?php echo $Event[8];?> | Orphanage : <?php echo $Event[11];?> .
                                        </small>
                                        <p class="card-text"><?php echo $Event[9];?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    mysqli_close($db);
                    ?>
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
