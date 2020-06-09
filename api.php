<?php
include ('translation.php');
include ('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webtech2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script>
    <script src="https://unpkg.com/jspdf-autotable@3.5.3/dist/jspdf.plugin.autotable.js"></script>

</head>
<body>
<script>
    function getPDF() {
        var doc = new jsPDF();
        var header = function (data) {
            doc.setFontSize(18);
            doc.setFontStyle('normal');
            doc.text('<?php echo $lang['prelozene27']?>', 80, 10);
        };
        doc.autoTable({
            theme:'grid',
            didDrawPage : header,
            head: [['Argument', '<?php echo $lang['prelozene22']?>']],
            body: [
                ['modelData', '<?php echo $lang['prelozene23']?>'],
                ['r', '<?php echo $lang['prelozene24']?>'],
                ['pos', '<?php echo $lang['prelozene25']?>'],
                ['apikey', '<?php echo $lang['prelozene26']?>']
            ],
        }),50,50

        doc.setFontSize(9);
        doc.text('http://147.175.121.210:8222/zaverecny_projekt/matlabDataApi.php?modelData=(meno)&r=(hodnota)&pos=(hodnota)&apikey=(hodnota)\n',5,70);
        doc.save('popisAPI.pdf')
    }

</script>

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
            <a href="api.php?lang=sk"><img src="http://www.geonames.org/flags/x/sk.gif" style="height: 25px; width: 40px; margin-top: 15px"></a>
            <a href="api.php?lang=en"><img src="http://www.geonames.org/flags/x/uk.gif" style="height: 25px; width: 40px; margin-top: 15px"></a>
        </ul>
    </div>
</nav>

<br><h2 style="text-align: center"><?php echo $lang['prelozene27']?></h2>

<div class="content" style="text-align: center;">
    <p >http://147.175.121.210:8222/zaverecny_projekt/matlabDataApi.php?modelData=(meno)&r=(hodnota)&pos=(hodnota)&apikey=(hodnota)</p>
    <table align="center" class="table table-bordered" style="width: 70%; margin-top: 3%">
        <thead>
        <tr>
            <th scope="col">Parameter</th>
            <th scope="col"><?php echo $lang['prelozene22']?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">modelData</th>
            <td><?php echo $lang['prelozene23']?></td>
        </tr>
        <tr>
            <th scope="row">r</th>
            <td><?php echo $lang['prelozene24']?></td>
        </tr>
        <tr>
            <th scope="row">pos</th>
            <td colspan="2"><?php echo $lang['prelozene25']?></td>
        </tr>
        <tr>
            <th scope="row">apikey</th>
            <td colspan="2"><?php echo $lang['prelozene26']?></td>
        </tr>
        </tbody>
    </table>
</div>
<button class="btn btn-primary" onclick="getPDF()" style="margin-left: 15%">Export PDF</button>
</body>
</html>
