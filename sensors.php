<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sensoren</title>
</head>
<body>
<?php
include "config.php"; // get your ptg details
include "home.php"; // get the navigation bar
?>
<div id="h1">
    <h1>All Sensors</h1>
</div>
<?php
// make an api call to get data
$url1 = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=probe,group,device,sensor,status&count=8729&username=$username&password=$password");
$url1 = json_decode($url1, true);
for ($i = 0; $i < 8729; $i++) {
    echo $url1['sensors'][$i]['probe'] . ", ";
    echo $url1['sensors'][$i]['group'] . ", ";
    echo $url1['sensors'][$i]['device'] . ", ";
    echo $url1['sensors'][$i]['sensor'] . ", ";
    echo $url1['sensors'][$i]['status'];

    // show pictures by status
    if ($url1['sensors'][$i]['status'] == "Up") {
        echo "<img src='img/Up.jpg' style='width:50px; height:50px;'><br><br>";
    }

    elseif ($url1['sensors'][$i]['status'] == "Warning") {
        echo "<img src='img/Warning.jpg' style='width:50px; height:50px;'><br><br>";
    }

    elseif ($url1['sensors'][$i]['status'] == "Down") {
        echo "<img src='img/Down.jpg' style='width:50px; height:50px;'><br><br>";
    }

    elseif ($url1['sensors'][$i]['status'] == "Down (Acknowledged)") {
        echo "<img src='img/Down%20(Acknowledged).jpg' style='width:50px; height:50px;'><br><br>";
    }

    else {
        echo "<br><br>";
    }
}
?>
</body>
</html>