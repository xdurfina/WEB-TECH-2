<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include ('translation.php');
include ('config.php');

$sql_tlmic = "SELECT count(*) as sucet from visits where page='tlmic'";
$tlmic = $conn->query($sql_tlmic);
$result_tlmic = $tlmic->fetch_assoc();

$sql_kyvadlo = "SELECT count(*) as sucet from visits where page='kyvadlo'";
$kyvadlo = $conn->query($sql_kyvadlo);
$result_kyvadlo = $kyvadlo->fetch_assoc();

$sql_lietadlo = "SELECT count(*) as sucet from visits where page='lietadlo'";
$lietadlo = $conn->query($sql_lietadlo);
$result_lietadlo = $lietadlo->fetch_assoc();

$sql_gulicka = "SELECT count(*) as sucet from visits where page='gulicka'";
$gulicka = $conn->query($sql_gulicka);
$result_gulicka = $gulicka->fetch_assoc();

if(isset($_POST['mail'])) {
    $to=$_POST['email'];
    $mail = new PHPMailer;
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'webtech2k20@gmail.com';
    $mail->Password = '123456abc.';

    $mail->setFrom('webtech2k20@gmail.com');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = 'Animacie-Navstevnost';
    $mail->Body = '<html>
    <head>
    <title>Statistiky</title>
    </head>
    <body>
    <table>
    <thead>
    <tr>
        <th>Návštevy konkrétnych animácií:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Tlmic</th>
        <td>'.$result_tlmic['sucet'].'</td>
    </tr>
    <tr>
        <th>Kyvadlo</th>
        <td>'.$result_kyvadlo['sucet'].'</td>
    </tr>
    <tr>
        <th>Lietadlo</th>
        <td>'.$result_lietadlo['sucet'].'</td>
    </tr>
    <tr>
        <th>Gulicka</th>
        <td>'.$result_gulicka['sucet'].'</td>
    </tr>
    </tbody>
</table>
</body>
</html>';

    $mail->send();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Koncoročné zadanie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="statistika.php?lang=sk"><img src="http://www.geonames.org/flags/x/sk.gif" style="height: 35px"></a>
                <a href="statistika.php?lang=en"><img src="http://www.geonames.org/flags/x/uk.gif" style="height: 35px"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php"><?php echo $lang['prelozene1']?></a>
            </li>
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
    </div>
</nav>

<br><h4 style="text-align: center"><?php echo $lang['prelozene5']?> </h4>

<table class="table table-hover table-dark" style="width: 500px">
    <thead>
    <tr>
        <th scope="col"><?php echo $lang['prelozene14']?>:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><?php echo $lang['prelozene9']?></th>
        <td><?php echo $result_tlmic["sucet"] ?>x</td>
    </tr>
    <tr>
        <th scope="row"><?php echo $lang['prelozene10']?></th>
        <td><?php echo $result_kyvadlo["sucet"] ?>x</td>
    </tr>
    <tr>
        <th scope="row"><?php echo $lang['prelozene8']?></th>
        <td colspan="2"><?php echo $result_lietadlo["sucet"] ?>x</td>
    </tr>
    <tr>
        <th scope="row"><?php echo $lang['prelozene7']?></th>
        <td colspan="2"><?php echo $result_gulicka["sucet"] ?>x</td>
    </tr>
    </tbody>
</table>
<form method="post" action="statistika.php">
    <input type="email" name="email" id="email">
    <input type="submit" name="mail" id="mail" value="<?php echo $lang['prelozene15']?>">
</form>

</body>
</html>
