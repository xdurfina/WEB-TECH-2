<?php
$pos = 0;

if (isset($_REQUEST['cislo'])) {

    $hodnota = $_REQUEST['cislo'];
    $cmd = "octave -H octave-modely/kyvadlo.m $hodnota $pos 2>&1";
    exec($cmd, $output);
    $finalout = array();


    foreach ($output as $value) {
        $localstring = substr($value, 2);
        array_push($finalout, $localstring);
    }

    unset($finalout[0]);
    unset($finalout[1]);


    $cas = array_slice($finalout, 0, 201);
    $kyvadlo = array_slice($finalout, -402, 201);
    $uholKyvadla = array_slice($finalout, 402);


}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Prevrátené kyvadlo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.3/fabric.min.js"></script>

    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.13/fabric.min.js"></script>-->
</head>
<body>

<br>

<h3 style="text-align: center">Simulácia - Prevrátené kyvadlo</h3>
<form action="kyvadlo.php" method="post">
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

    <div style="overflow: hidden;width:50%;border: 1px solid black">
        <canvas id="c" width="600" height="450"></canvas>
    </div>
</div>
<script>

    function runGraph() {
        var indexCounter = 0;
        var cas = <?php echo json_encode($cas); ?>;
        var kyvadlo = <?php echo json_encode($kyvadlo); ?>;
        var uholKyvadla = <?php echo json_encode($uholKyvadla); ?>;

        var casGraf = [];
        var kyvadloGraf = [];
        var uholKyvadlaGraf = [];


        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: casGraf,
                datasets: [{
                    label: 'Kyvadlo',
                    xAxisID: 'A',
                    data: kyvadloGraf,
                    backgroundColor: 'rgba(130,122,255,0.48)',
                }, {
                    label: 'Uhol kyvadla',
                    xAxisID: 'A',
                    data: uholKyvadlaGraf,
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
            if (indexCounter < 202) {
                myChart.data.datasets[0].data.push(kyvadlo[indexCounter]);
                myChart.data.datasets[1].data.push(uholKyvadla[indexCounter]);
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

            fabric.Image.fromURL('obrazky/pendulum_base.png', function(img) {
                img2 = img.scale(0.35).set({
                    left: 180,
                    top: 335,
                    selectable: false,
                });
                canvas.add(img2);
            });

            fabric.Image.fromURL('obrazky/pendulum_stick.png', function(img) {
                img1 = img.scale(0.5).set({  left: 180,
                    top: 360,
                    selectable: false,
                    originY: 'bottom',

                });
                canvas.add(img1);
            });

            array = <?php echo json_encode($kyvadlo) ?>;
            array_length = array.length;

            array2 = <?php echo json_encode($uholKyvadla) ?>;

            var i = 0;
            setInterval(function () {
                if (i < array_length - 1) {
                    i++;
                    canvas.getObjects()[1].left = (180 + array[i]*50);
                    canvas.getObjects()[1].angle = -(array2[i]*50);
                    canvas.getObjects()[0].left = (180 + array[i]*50);
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