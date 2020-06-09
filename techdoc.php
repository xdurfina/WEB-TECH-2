<?php
require 'vendor/autoload.php';
include ('translation.php');
include ('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webtech 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        ol li {
            padding: 10px 0 10px 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="index.php"><img src="obrazky/logo.png" alt="" style="width: 50%; height: 50%; margin-left: 25%" ></a>
        <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
                <a class="nav-link" href="api.php">API</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="octaveconsole.php"><?php echo $lang['prelozene2']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="techdoc.php"><?php echo $lang['prelozene3']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ulohy.php"><?php echo $lang['prelozene4']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="statistika.php"><?php echo $lang['prelozene5']?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $lang['prelozene6']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="simulacie/gulicka.php"><?php echo $lang['prelozene7']?></a>
                    <a class="dropdown-item" href="simulacie/lietadlo.php"><?php echo $lang['prelozene8']?></a>
                    <a class="dropdown-item" href="simulacie/tlmic.php"><?php echo $lang['prelozene9']?></a>
                    <a class="dropdown-item" href="simulacie/kyvadlo.php"><?php echo $lang['prelozene10']?></a>
                </div>
            </li>

        </ul>
        <ul class="nav-item">
            <a href="techdoc.php?lang=sk"><img src="http://www.geonames.org/flags/x/sk.gif" style="height: 25px; width: 40px; margin-top: 15px"></a>
            <a href="techdoc.php?lang=en"><img src="http://www.geonames.org/flags/x/uk.gif" style="height: 25px; width: 40px; margin-top: 15px"></a>
        </ul>
    </div>
</nav>

<br><h2 style="text-align: center; margin-bottom: 1%"><?php echo $lang['prelozene3']?> </h2>
<div style="padding-left: 30px; line-height: 140%;">
    <p><b><?php echo $lang['prelozene35']?>: </b>Jaroslav Ďurfina, Tomáš Plaštiak, Patrícia Török, Šimon Zaujec</p>
    <p><b><?php echo $lang['prelozene36']?>: </b><a href="http://147.175.121.210:8222/zaverecny_projekt/index.php">http://147.175.121.210:8222/zaverecny_projekt/index.php</a><br></p>
    <p><b>PhpMyAdmin: </b><a href="http://147.175.121.210:8222/phpmyadmin/">http://147.175.121.210:8222/phpmyadmin</a></p><br>
    <p><b><?php echo $lang['prelozene37']?>: </b>Octave package <code style="padding-left: 20px;"><i>sudo apt-get install -y octave</i></code><br>
        <?php echo $lang['prelozene38']?> <i>(.m)</i>.</p><br>
    <p><b><?php echo $lang['prelozene39']?>:</b></p>
    <ol>
        <li> ChartJS (<a href="https://www.chartjs.org/">chartjs.org</a>) - <?php echo $lang['prelozene40']?></li>
        <li> FabricJS (<a href="http://fabricjs.com/">fabricjs.com</a>) - <?php echo $lang['prelozene41']?></li>
        <li> JSPDF (<a href="https://github.com/MrRio/jsPDF">github.com</a>) - <?php echo $lang['prelozene42']?></li>
        <li> PHPMailer (<a href="https://github.com/PHPMailer/PHPMailer">github.com</a>) - <?php echo $lang['prelozene43']?></li>
        <li> Bootstrap (<a href="https://getbootstrap.com/">getbootstrap.com</a>) - <?php echo $lang['prelozene44']?></li>
        <li> Popper.js (<a href="https://popper.js.org/">popper.js.org</a>) - CSS</li>
        <li> jQuery (<a href="https://jquery.com/">jquery.com</a>) - <?php echo $lang['prelozene45']?></li>
    </ol>
</div>
</body>
</html>
