<?php

//$cmd=ltrim(shell_exec('ls'));

//$fh = fopen('/octave-modely/lietadlo.txt','r');
//echo $fh;

ob_start();
include("octave-modely/gulicka.m");
ob_end_clean();

//fclose($file);
//$output = ltrim(shell_exec("octave --eval  'disp (pi); 1+1'"));

$cmd= "octave --eval 'gulicka.m'";

$output=exec($cmd,$out);
var_dump($out);

//echo"<pre> $out </pre>"
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Load plotly.js into the DOM -->
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
</head>

<body>

    <div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>
<script>
    var data = [
        {
            x: ['giraffes', 'orangutans', 'monkeys','test'],
            y: [20, 14, 23,44],
            type: 'bar'
        }
    ];

    Plotly.plot('myDiv', data);
</script>


</body>
</html>
