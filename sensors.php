<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sensoren</title>
</head>
<body>
<?php
include "home.php";
?>
<div id="h1">
    <h1>All Sensors</h1>
</div>
<?php
$url1 = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=probe,group,device,sensor,status&count=8729&username=Pim%20Bohm&password=P1mP1mP1mP1m");
$url1 = json_decode($url1, true);
for ($i = 0; $i < 8729; $i++) {
    echo $url1['sensors'][$i]['probe'] . ", ";
    echo $url1['sensors'][$i]['group'] . ", ";
    echo $url1['sensors'][$i]['device'] . ", ";
    echo $url1['sensors'][$i]['sensor'] . ", ";
    echo $url1['sensors'][$i]['status'];

    if ($url1['sensors'][$i]['status'] == "Up") {
        echo "<img src='img/Green%20LED%20Bulb.jpg' style='width:50px; height:50px;'><br><br>";
    }

    if ($url1['sensors'][$i]['status'] == "Warning") {
        echo "<img src='img/yellow%20light%20bulb.jpg' style='width:50px; height:50px;'><br><br>";
    }

    if ($url1['sensors'][$i]['status'] == "Down") {
        echo "<img src='img/red%20light%20bulb.jpg' style='width:50px; height:50px;'><br><br>";
    }

    if ($url1['sensors'][$i]['status'] == "Paused  (paused)") {
        echo "<img src='img/pause.png' style='width:50px; height:50px;'><br><br>";
    }

    if ($url1['sensors'][$i]['status'] == "Down (Acknowledged)") {
        echo "<img src='img/uitroepteken.jpg' style='width:50px; height:50px;'><br><br>";
    }
}
?>
</body>
</html>