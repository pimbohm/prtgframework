<?php
include "config.php";// get your prtg details

// make the api call to get the data
$url = "https://prtg.lumiad.com/api/table.json?content=devices&output=json&columns=device&id=4958&username=$username&password=$password";
$url = file_get_contents($url);
$url = json_decode($url, true);

$id = 34840;
$id2 = 34854;
// make the api call to get the data
$body = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id&username=$username&password=$password";
$body = file_get_contents($body);
$body = json_decode($body, true);

// make the api call to get the data
$body2 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id2&username=$username&password=$password";
$body2 = file_get_contents($body2);
$body2 = json_decode($body2, true);

$result = $body['channels'][10]['lastvalue'] + $body2['channels'][10]['lastvalue'];
$id3 = 34846;
$id4 = 34860;
// make the api call to get the data
$body3 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id3&username=$username&password=$password";
$body3 = file_get_contents($body3);
$body3 = json_decode($body3, true);

// make the api call to get the data
$body4 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id4&username=$username&password=$password";
$body4 = file_get_contents($body4);
$body4 = json_decode($body4, true);

$result2 = $body3['channels'][10]['lastvalue'] + $body4['channels'][10]['lastvalue'];
$id5 = 34845;
$id6 = 34859;
// make the api call to get the data
$body5 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id5&username=$username&password=$password";
$body5 = file_get_contents($body5);
$body5 = json_decode($body5, true);

// make the api call to get the data
$body6 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id6&username=$username&password=$password";
$body6 = file_get_contents($body6);
$body6 = json_decode($body6, true);

$result3 = $body5['channels'][10]['lastvalue'] + $body6['channels'][10]['lastvalue'];
$id7 = 34842;
$id8 = 34855;
// make the api call to get the data
$body7 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id7&username=$username&password=$password";
$body7 = file_get_contents($body7);
$body7 = json_decode($body7, true);

// make the api call to get the data
$body8 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id8&username=$username&password=$password";
$body8 = file_get_contents($body8);
$body8 = json_decode($body8, true);

$result4 = $body7['channels'][10]['lastvalue'] + $body8['channels'][10]['lastvalue'];
$id9 = 34841;
$id10 = 34857;
// make the api call to get the data
$body9 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id9&username=$username&password=$password";
$body9 = file_get_contents($body9);
$body9 = json_decode($body9, true);

// make the api call to get the data
$body10 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id10&username=$username&password=$password";
$body10 = file_get_contents($body10);
$body10 = json_decode($body10, true);

$result5 = $body9['channels'][10]['lastvalue'] + $body10['channels'][10]['lastvalue'];

$id11 = 34844;
$id12 = 34858;
// make the api call to get the data
$body11 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id11&username=$username&password=$password";
$body11 = file_get_contents($body11);
$body11 = json_decode($body11, true);
// make the api call to get the data
$body12 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id12&username=$username&password=$password";
$body12 = file_get_contents($body12);
$body12 = json_decode($body12, true);
$result6 = $body11['channels'][10]['lastvalue'] + $body12['channels'][10]['lastvalue'];
$id13 = 34843;
$id14 = 34856;

// make the api call to get the data
$body13 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id13&username=$username&password=$password";
$body13 = file_get_contents($body13);
$body13 = json_decode($body13, true);

// make the api call to get the data
$body14 = "https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$id14&username=$username&password=$password";
$body14 = file_get_contents($body14);
$body14 = json_decode($body14, true);

$result7 = $body13['channels'][10]['lastvalue'] + $body14['channels'][10]['lastvalue'];

// add all user counts together
$total = $body['channels'][10]['lastvalue'] + $body2['channels'][10]['lastvalue'] +
    $body3['channels'][10]['lastvalue'] + $body4['channels'][10]['lastvalue'] +
    $body5['channels'][10]['lastvalue'] + $body6['channels'][10]['lastvalue'] +
    $body7['channels'][10]['lastvalue'] + $body8['channels'][10]['lastvalue'] +
    $body9['channels'][10]['lastvalue'] + $body10['channels'][10]['lastvalue'] +
    $body11['channels'][10]['lastvalue'] + $body12['channels'][10]['lastvalue'] +
    $body13['channels'][10]['lastvalue'] + $body14['channels'][10]['lastvalue'];

$device = $url["devices"][3]["device"];
$device2 = $url["devices"][4]["device"];
$device3 = $url["devices"][5]["device"];
$device4 = $url["devices"][6]["device"];
$device5 = $url["devices"][7]["device"];
$device6 = $url["devices"][8]["device"];
$device7 = $url["devices"][9]["device"];
$percentage = floor(($result/$total) * 100);
$percentage2 = floor(($result2/$total) * 100);
$percentage3 = floor(($result3/$total) * 100);
$percentage4 = floor(($result4/$total) * 100);
$percentage5 = floor(($result5/$total) * 100);
$percentage6 = floor(($result6/$total) * 100);
$percentage7 = floor(($result7/$total) * 100);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lumi User count</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(staafDiagram);

        // make functions to show diagrams
        function staafDiagram() {
            var data = google.visualization.arrayToDataTable([
                <?php
                echo "['', 'apparaten', '%'],
                ['$device',$result,$percentage],
                ['$device2',$result2,$percentage2],
                ['$device3',$result3,$percentage3],
                ['$device4',$result4,$percentage4],
                ['$device5',$result5,$percentage5],
                ['$device6',$result6,$percentage6],
                ['$device7',$result7,$percentage7],
                ['Total',$total,100],
                ";
                ?>
            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        // function to autorefresh page
        function loadref(time)
        {
            setTimeout("location.reload(true);",time);
        }

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(pieChart);

        function pieChart() {

            var data = google.visualization.arrayToDataTable([
                <?php
                echo "
                ['Devices', 'Users'],
                ['$device', $result],
                ['$device2', $result2],
                ['$device3', $result3],
                ['$device4', $result4],
                ['$device5', $result5],
                ['$device6', $result6],
                ['$device7', $result7],
                "
                ?>
            ]);

            var options = {
                title: ''
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                <?php
                echo "
                ['Devices', '$device', '$device2', '$device3', '$device4', '$device5', '$device6', '$device7'],
                ['Lumi-HQ total', $result, $result2, $result3, $result4, $result5, $result6, $result7]
                "
                ?>
            ]);

            var options = {
                title: '',
                vAxis: {title: ''},
                isStacked: true
            };

            var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }


    </script>
</head>
<body onload="loadref(60000)"> <!-- set refresh time in seconds -->
<?php
include "home.php"; // get the navigation bar
?>
<div id="h1">
    <h1>User count Lumiad</h1>
</div>
<?php
echo "<div class='device'>";

// show the total users
echo "Total count";
echo "<hr>";
if ($total < 40) {
    echo "<div id='groen'>";
    echo $total;
    echo "</div>";
} else {
    echo "<div id='rood'>";
    echo $total;
    echo "</div>";
}
echo "</div>";
?>
<br>
<br>
<br>
<br>
<br>
<!-- show the diagrams -->
<div id="columnchart_material" style="width: 100%; height:300px;"></div>
<div id="container">
    <div id="piechart" style="width: 60%; height: 400px;"></div>
    <div id="chart_div" style="width: 40%; height: 500px;"></div>
</div>
</body>
</html>