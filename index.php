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
