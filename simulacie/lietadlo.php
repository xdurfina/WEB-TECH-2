<?php
$pos = 0;

if (isset($_REQUEST['cislo'])) {

    $hodnota = $_REQUEST['cislo'];
    $cmd = "octave -H ../octave-modely/lietadlo.m $hodnota $pos 2>&1";
    exec($cmd, $output);
    $finalout = array();

    foreach ($output as $value) {
        $localstring = substr($value, 2);
        array_push($finalout, $localstring);
    }

    unset($finalout[0]);
    unset($finalout[1]);

    //var_dump($finalout);

    $cas = array_slice($finalout, 0, 401);
    $lietadlo = array_slice($finalout, -802, 401);
    $klapka = array_slice($finalout, 802);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Lietadlo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.3/fabric.min.js"></script>
    <!--    <script src="https://unpkg.com/fabric@4.0.0-beta.8/dist/fabric.js"></script>-->
</head>
<body>
<br>
<h3 style="text-align: center">Simulácia - Lietadlo</h3>
<form action="lietadlo.php" method="post">
    <label for="cislo">Velkost prekazky:</label>
    <input type="text" name="cislo" id="cislo" required placeholder="od -1  do 1">
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
        <canvas id="c" width="700" height="1000"></canvas>
    </div>
</div>
<script>

    function runGraph() {
        var indexCounter = 0;
        var cas = <?php echo json_encode($cas); ?>;
        var lietadlo = <?php echo json_encode($lietadlo); ?>;
        var klapka = <?php echo json_encode($klapka); ?>;

        var casGraf = [];
        var vozidloGraf = [];
        var tlmicGraf = [];

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: casGraf,
                datasets: [{
                    label: 'Lietadlo',
                    xAxisID: 'A',
                    data: vozidloGraf,
                    backgroundColor: 'rgba(130,122,255,0.48)',
                }, {
                    label: 'Klapka',
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
            if (indexCounter < 402) {
                myChart.data.datasets[0].data.push(lietadlo[indexCounter]);
                myChart.data.datasets[1].data.push(klapka[indexCounter]);
                myChart.data.labels.push(cas[indexCounter]);
                indexCounter++;
                myChart.update();
            }
        }, 100);
    }
</script>

<script>
    function radians_to_degrees(radians)
    {
        var pi = Math.PI;
        return radians * (180/pi);
    }
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

            fabric.Image.fromURL('../obrazky/lietadlo.png', function(img) {
                img1 = img.scale(0.35).set({  left: 100,
                    top: 105,
                    selectable: false,
                });
                fabric.Image.fromURL('../obrazky/flap.png', function(img) {
                    img2 = img.scale(0.35).set({
                        left: 180,
                        top: 170,
                        selectable: false,
                        originX: 'right',
                        angle: radians_to_degrees(<?php echo $hodnota?>)
                    });
                    canvas.add(group = new fabric.Group([ img1, img2],
                        { left: 100, top: 250 }))
                });
            });

            array = <?php echo json_encode($klapka) ?>;
            array_length = array.length;

            array2 = <?php echo json_encode($lietadlo) ?>;
            var i = 0;
            setInterval(function () {
                if (i < array_length - 1) {
                    i++;
                    canvas.getObjects()[0].angle = -radians_to_degrees(array2[i]);
                    canvas.getObjects()[0].getObjects()[1].angle = radians_to_degrees(array[i]);
                    canvas.renderAll();
                }
            }, 100);
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