<?php
include('translation.php');


$text = file('consolelog.txt');

if (isset($_REQUEST['prikaz'])) {
    $prikazy = htmlspecialchars($_REQUEST['prikaz']);
    $logfile = fopen("consolelog.txt", "a") or die("Nedokazem najst subor consolelog.txt");

    $cmd = "octave --eval ' $prikazy ' ";

    $output = exec($cmd, $out);

    $day = date("F j, Y, G:i") . "\n";
    fwrite($logfile, $day);
    fwrite($logfile, $prikazy);
    fwrite($logfile, "\n");
    foreach ($out as $value) {
        fwrite($logfile, $value);
        fwrite($logfile, "\n");
    }
    fwrite($logfile, "\n");
    fclose($logfile);

    $text = file('consolelog.txt');

    $fp = fopen('mura_consolelogs.csv', 'w');
    foreach ($text as $line) {
        if ($line != "\n") {
            if (strpos($line, "\n")){$line = substr($line,0,-1);}
            $localarray = array($line);
            fputcsv($fp, $localarray);
            unset($localarray[0]);
        }
    }
    fclose($fp);


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webtech 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
            integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script>
    <script src="https://unpkg.com/jspdf-autotable@3.5.3/dist/jspdf.plugin.autotable.js"></script>

    <script>
        function getPDF() {
            var text = <?php echo json_encode($text); ?>;

            var doc = new jsPDF();
            doc.setFontSize(22);
            doc.text(20, 20, 'MURA PROJECT - OCTAVE LOG FILES');

            doc.setFontSize(10);
            doc.text(20, 30, text);

            doc.save('mura_logfiles.pdf');
        }

        function getCSV() {
            var data = <?php echo json_encode($text); ?>;

            var csv = 'Name,Title\n';
            data.forEach(function (row) {
                csv += row.join(',');
                csv += "\n";
            });

            console.log(csv);
            var hiddenElement = document.createElement('a');
            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
            hiddenElement.target = '_blank';
            hiddenElement.download = 'people.csv';
            hiddenElement.click();
        }
    </script>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="index.php"><img src="obrazky/logo.png" alt="" style="width: 50%; height: 50%; margin-left: 25%"></a>
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="api.php">API</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="octaveconsole.php"><?php echo $lang['prelozene2'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="techdoc.php"><?php echo $lang['prelozene3'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ulohy.php"><?php echo $lang['prelozene4'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="statistika.php"><?php echo $lang['prelozene5'] ?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <?php echo $lang['prelozene6'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="simulacie/gulicka.php"><?php echo $lang['prelozene7'] ?></a>
                    <a class="dropdown-item" href="simulacie/lietadlo.php"><?php echo $lang['prelozene8'] ?></a>
                    <a class="dropdown-item" href="simulacie/tlmic.php"><?php echo $lang['prelozene9'] ?></a>
                    <a class="dropdown-item" href="simulacie/kyvadlo.php"><?php echo $lang['prelozene10'] ?></a>
                </div>
            </li>

        </ul>
        <ul class="nav-item">
            <a href="octaveconsole.php?lang=sk"><img src="http://www.geonames.org/flags/x/sk.gif"
                                                     style="height: 25px; width: 40px; margin-top: 15px"></a>
            <a href="octaveconsole.php?lang=en"><img src="http://www.geonames.org/flags/x/uk.gif"
                                                     style="height: 25px; width: 40px; margin-top: 15px"></a>
        </ul>
    </div>
</nav>

<div style="text-align: center; margin-top: 1.5%">
    <h2><?php echo $lang['prelozene29'] ?></h2>
    <form action="octaveconsole.php" method="post">
        <input type="text" name="prikaz">
        <input class="btn btn-primary" type="submit" value="Submit">

    </form>

    <br><h5><?php echo $lang['prelozene30'] ?></h5>
    <?php foreach ($out as $value) {
        echo $value;
        echo "<br>";
    } ?>
</div>

<div style="text-align: center; margin-top: 50px">
<button class="btn btn-primary" onclick="getPDF()">Export logs to PDF</button>
<button class="btn btn-primary" onclick="location.href='http://147.175.121.210:8222/zaverecny_projekt/mura_consolelogs.csv'">Export logs to CSV</button>
</div>

</body>
</html>


