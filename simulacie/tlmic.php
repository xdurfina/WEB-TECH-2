<?php
//if(isset($_REQUEST['cislo'])){
$hodnota = 0.1;
$pos = 0;
//$hodnota = $_REQUEST['cislo'];

$cmd = "octave -H octave-modely/tlmic.m $hodnota $pos 2>&1";


exec($cmd, $output);


$finalout = array();

foreach ($output as $value) {
    $localstring = substr($value, 2);
    array_push($finalout, $localstring);
}

unset($finalout[0]);
unset($finalout[1]);

$cas = array_slice($finalout, 0, 501);
$vozidlo = array_slice($finalout, -1002, 501);
$tlmic = array_slice($finalout, 1002);

//var_dump($cas);
//var_dump($vozidlo);
//var_dump($tlmic);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Graph 1</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.13/fabric.min.js"></script>
</head>
<input>

<br>
<h3 style="text-align: center">OCTAVE PROJECT NAME - M.U.R.A. - 10</h3>
<canvas id="myChart" width="400" height="200"></canvas>


<button type="button" onclick="updateChart()"> updateChart</button>
<button type="button" onclick="addValue()"> addValue</button>
<button type="button" onclick="removeData()"> removeData</button>

<!--<form action="novytlmic.php" method="post">-->
<!--    <input type="text" name="cislo">-->
<!--    <input type="submit" value="Submit">-->
<!--</form>-->
<?php echo "Zadana hodnota:" . $hodnota ?>
<p id="cas"></p>
<p id="vozidlo"></p>
<p id="tlmic"></p>

<canvas id="c" width="400" height="400"></canvas>

<script>
    var array = [];
    var array2 = [];
    var array_length;
    (function() {
        var canvas = new fabric.Canvas('c');

        var rect = new fabric.Rect({
            width: 200,
            height: 20,
            top: 100,
            left: 100,
            fill: 'rgba(255,0,0,0.5)',
            selectable: false
        });
        var rect2 = new fabric.Rect({
            width: 100,
            height: 20,
            top: 180,
            left: 100,
            fill: 'rgba(41,0,255,0.5)',
            selectable: false
        });

        canvas.add(rect);
        canvas.add(rect2);

        array= <?php echo json_encode($tlmic) ?>;
        array2= <?php echo json_encode($vozidlo) ?>;
        array_length=array.length;
        var i=0;
        setInterval(function(){
            if(i < array_length - 1){
                i++;
                canvas.getObjects()[0].top = (100 + array2[i]*100);
                canvas.getObjects()[1].top = (180 + array[i]*100);
                canvas.renderAll();
            }
        }, 100);

    })();
</script>

</body>
</html>