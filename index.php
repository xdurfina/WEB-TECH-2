<?php
include ('translation.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webtech 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <a href="index.php?lang=sk"><img src="http://www.geonames.org/flags/x/sk.gif" style="height: 25px; width: 40px; margin-top: 15px"></a>
            <a href="index.php?lang=en"><img src="http://www.geonames.org/flags/x/uk.gif" style="height: 25px; width: 40px; margin-top: 15px"></a>
        </ul>
    </div>
</nav>

<br><h3 style="text-align: center"><?php echo $lang['prelozene11']?> - WEBTECH 2 </h3>
<h5 style="text-align: center">code name {mura} / Ďurfina, Török, Zaujec, Plaštiak </h5>

<div align="center" style="margin-top: 2%">
<img src="obrazky/jaro.jpg" class="img-circle" alt="x" style="width: 300px; height: 300px">
<img src="obrazky/pata.png" class="img-circle" alt="i" style="width: 300px; height: 300px">
<img src="obrazky/simon.png" class="img-circle" alt="y" style="width: 300px; height: 300px">
<img src="obrazky/tomas.png" class="img-circle" alt="u" style="width: 300px; height: 300px">

</div>

</body>
</html>
