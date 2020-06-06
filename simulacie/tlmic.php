<?php
$pos = 0;

if (isset($_REQUEST['cislo'])) {

    $hodnota = $_REQUEST['cislo'];
    $cmd = "octave -H ../octave-modely/tlmic.m $hodnota $pos 2>&1";
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


}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Tlmič auta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.13/fabric.min.js"></script>

</head>
<body>

<br>

<h3 style="text-align: center">Simulácia - Tlmič auta</h3>
<form action="tlmic.php" method="post">
    <label for="cislo">Velkost prekazky:</label>
    <input type="text" name="cislo" id="cislo" required>
    <label for="graf">Graf</label>
    <input type="checkbox" name="graf" id="graf">
    <label for="animacia">Animacia</label>
    <input type="checkbox" name="animacia" id="animacia"><br>
    <input type="submit" value="Submit">
    <?php echo "Zadana hodnota:" . $hodnota ?>
</form>

<div style="overflow: hidden;">
    <div style="width:50%; height:500px;float: left;">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <div style="overflow: hidden;width:50%;">
        <canvas id="c" width="600" height="1000"></canvas>
    </div>
</div>

<script>

    function runGraph() {
        var indexCounter = 0;
        var cas = <?php echo json_encode($cas); ?>;
        var vozidlo = <?php echo json_encode($vozidlo); ?>;
        var tlmic = <?php echo json_encode($tlmic); ?>;

        var casGraf = [];
        var vozidloGraf = [];
        var tlmicGraf = [];


        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: casGraf,
                datasets: [{
                    label: 'Vozidlo',
                    xAxisID: 'A',
                    data: vozidloGraf,
                    backgroundColor: 'rgba(130,122,255,0.48)',
                }, {
                    label: 'Tlmič',
                    xAxisID: 'A',
                    data: tlmicGraf,
                    backgroundColor: 'rgba(136,255,92,0.76)',
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        id: 'A',
                        position: 'bottom',
                        type: 'category',
                    }]
                }
            }
        });


        setInterval(function addValue() {
            if (indexCounter < 502) {
                myChart.data.datasets[0].data.push(vozidlo[indexCounter]);
                myChart.data.datasets[1].data.push(tlmic[indexCounter]);
                myChart.data.labels.push(cas[indexCounter]);
                indexCounter++;
                myChart.update();
            }
        }, 200);
    }
</script>


<script>

    function runAnimation() {

        var array = [];
        var array2 = [];
        var array_length;

        (function () {
            var canvas = this.__canvas = new fabric.Canvas('c');
            fabric.Object.prototype.transparentCorners = false;

            var $ = function (id) {
                return document.getElementById(id)
            };

            fabric.Image.fromURL('car.png', function (img) {
                img.scale(0.5).set({
                    left: 100,
                    top: 105,
                    selectable: false,
                    width: 1000,
                    height: 250,
                })
                canvas.add(img);
            });

            fabric.Image.fromURL('car_wheel.png', function (img2) {
                img2.scale(0.5).set({
                    left: 144,
                    top: 160,
                    width: 150,
                    height: 150,
                    selectable: false,
                })
                canvas.add(img2);
            });

            fabric.Image.fromURL('car_wheel.png', function (img3) {
                img3.scale(0.5).set({
                    left: 444,
                    top: 160,
                    width: 150,
                    height: 150,
                    selectable: false,
                })
                canvas.add(img3);
            });

            array = <?php echo json_encode($tlmic) ?>;
            array_length = array.length;

            array2 = <?php echo json_encode($vozidlo) ?>;

            var i = 0;
            setInterval(function () {
                if (i < array_length - 1) {
                    i++;
                    canvas.getObjects()[0].top = (105 - array2[i] * 1);
                    canvas.getObjects()[1].top = (160 - array[i] * 1);
                    canvas.getObjects()[2].top = (160 - array[i] * 1);

                    canvas.renderAll();
                    console.log(array[i]);
                }
            }, 200);

        })();
    }
</script>

<?php
if ($_REQUEST['graf'] == true) {
    echo '<script type="text/javascript">
runGraph();
</script>';
}
if ($_REQUEST['animacia'] == true ) {
    echo '<script type="text/javascript">
runAnimation();
</script>';
}
?>


</body>
</html>