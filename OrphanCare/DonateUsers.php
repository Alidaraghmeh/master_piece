<?php
session_start();
if (!isset($_SESSION['emailU']) || !isset($_SESSION['passwordU'])) {
    echo '<script>window.alert("Oooh! Sorry, You must SignIn before entering this page")</script>';
    echo '<script>window.location="JoinUS.html"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OrphanCare</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css "/>
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
                        <li><a>Welcome <?php echo $_SESSION["nameU"]; ?></a></li>
                    </ul>
                </td>
                <td><a href="NewsLettersU.php"><button class="donate-button">BACK</button></a></td>
            </tr>
        </table>
    </div>
    <div class="content">
        <div class="mainContent">
            <div class="part1">
                <h3>1 - Donate Online :</h3>
                <form action="DoneDonateUsers.php" method="post" class="form">
                    <?php
                    $nameU = $_SESSION["nameU"];
                    $NIDU = $_SESSION["NIDU"];
                    $phoneU = $_SESSION["phoneU"];
                    $emailU = $_SESSION["emailU"];
                    print("
                    <input type='hidden' name='name' value='$nameU' />
                    <input type='hidden' name='NID' value='$NIDU' />
                    <input type='hidden' name='phone' value='$phoneU' />
                    <input type='hidden' name='email' value='$emailU' />
                    ");
                    ?>
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
                    <p>Choose Donation Type</p>
                    <select name='type' required />
                        <option value=''>Select one</option>
                        <option value='Clothes'>Clothes</option>
                        <option value='Food'>Food</option>
                        <option value='Toys'>Toys</option>
                        <option value='Money'>Money</option>
                        <option value='Other'>Other</option>
                    </select>
                    <p>Quantity / Details</p>
                    <textarea name='details' rows='4' required></textarea>
                    <button class='form-button' type='submit'>Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="footer">
    <table style="width: 100%;">
        <tr>
            <td>
                <img src="images/logo.png" width="50" height="50" style="margin-left: 100px;">
            </td>
            <td>
                <p>&copy; 2023 OrphanCare. All Rights Reserved | Design by <a href="https://www.linkedin.com/in/yasmin-abdel-aziz/">Yasmin Abdel Aziz</a></p>
            </td>
            <td>
                <div class="social-icons">
                    <ul>
                        <li><a href="#" class="fab fa-facebook-f"></a></li>
                        <li><a href="#" class="fab fa-twitter"></a></li>
                        <li><a href="#" class="fab fa-google-plus-g"></a></li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
