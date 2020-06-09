<?php
$pos = 0;
if (isset($_REQUEST['cislo'])) {

    $hodnota = strval($_REQUEST['cislo']);

    $cmd = "octave -H ../octave-modely/gulicka.m $hodnota $pos 2>&1";
    exec($cmd, $output);
    $finalout = array();

    foreach ($output as $value) {
        $localstring = substr($value, 2);
        array_push($finalout, $localstring);
    }

    unset($finalout[0]);
    unset($finalout[1]);
    unset($finalout[2]);
    unset($finalout[3]);
    unset($finalout[4]);
    unset($finalout[5]);

    $cas = array_slice($finalout, 0, 501);
    $poziciaGulicky = array_slice($finalout, -1002, 501);
    $naklonTyce = array_slice($finalout, 1002);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gulička</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.3/fabric.min.js"></script>
</head>
<body>
<br>
<h3 style="text-align: center">Simulácia - Gulička</h3>
<form action="gulicka.php" method="post">
    <label for="cislo">Pozicia guličky:</label>
    <input style="width: 100px;" type="number" name="cislo" id="cislo" required max="150" min="-150" placeholder="<-150, 150>">
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
        <canvas id="c" width="1000" height="400"></canvas>
    </div>
</div>
<script>
    function runGraph() {
        var indexCounter = 0;
        var cas = <?php echo json_encode($cas); ?>;
        var poziciaGulicky = <?php echo json_encode($poziciaGulicky); ?>;
        var naklonTyce = <?php echo json_encode($naklonTyce); ?>;

        var casGraf = [];
        var poziciaGulickyGraf = [];
        var naklonTyceGraf = [];

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: casGraf,
                datasets: [{
                    label: 'Gulicka',
                    xAxisID: 'A',
                    data: poziciaGulickyGraf,
                    backgroundColor: 'rgba(130,122,255,0.48)',
                }, {
                    label: 'Uhol tyce',
                    xAxisID: 'A',
                    data: naklonTyceGraf,
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
                myChart.data.datasets[0].data.push(poziciaGulicky[indexCounter]);
                myChart.data.datasets[1].data.push(naklonTyce[indexCounter]);
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

            fabric.Image.fromURL('../obrazky/ball_base.png', function(img) {
                img1 = img.scale(0.5).set({
                    left: 100,
                    top: 190,
                    selectable: false,
                    originX: 'center',
                    originY: 'center',
                });
                fabric.Image.fromURL('../obrazky/ball.png', function(img) {
                    img2 = img.scale(0.5).set({
                        left: 100,
                        top: 158,
                        selectable: false,
                    });
                    canvas.add(group = new fabric.Group([ img1, img2],
                        {   left: 400,
                            top: 250,
                            originX: 'center',
                            originY: 'center',
                            selectable: false,
                        }))
                });
            });

            array = <?php echo json_encode($poziciaGulicky) ?>;
            array_length = array.length;

            array2 = <?php echo json_encode($naklonTyce) ?>;

            var i = 0;
            setInterval(function () {
                if (i < array_length - 1) {
                    i++;
                    canvas.getObjects()[0].getObjects()[1].left = (array[i]*1);
                    canvas.getObjects()[0].angle = radians_to_degrees(array2[i]*10);
                    canvas.renderAll();
                }
            }, 100);
        })();
    }
</script>
<?php
if ($_REQUEST['graf'] == true) {
    echo '<script>runGraph();</script>';
}
if ($_REQUEST['animacia'] == true ) {
    echo '<script>runAnimation();</script>';
}
?>
</body>
</html>