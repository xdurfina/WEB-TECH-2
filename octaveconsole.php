<?php
if(isset($_REQUEST['prikaz'])) {
    $prikazy = $_REQUEST['prikaz'];
    $cmd = "octave --eval " . $prikazy;
    $output = exec($cmd, $out);
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
                <a class="nav-link" href="index.php">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="api.php">API</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="octaveconsole.php">Octave konzola</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="techdoc.php">Technická dokumentácia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ulohy.php">Rozdelenie úloh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="statistics.php">Štatistika</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Simulations
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Gulička</a>
                    <a class="dropdown-item" href="#">Lietadlo</a>
                    <a class="dropdown-item" href="#">Tlmič</a>
                    <a class="dropdown-item" href="#">Prevrátené kyvadlo</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div style="text-align: center">
<h4>Zadanie príkazov:</h4>
<form action="octaveconsole.php" method="post">
    <input type="text" name="prikaz">
    <input type="submit" value="Submit">

</form>

<br><h5>Vystup:</h5>
<?php echo $output?>
</div>



</body>
</html>


