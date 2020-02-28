<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sensorssort</title>
</head>
<body>
<?php
include "home.php";
?>
<div id="h1">
    <h1>All Sensors</h1>
</div>
<form method="post">
    <input type="hidden" name="up" value="Up">
    <input type="hidden" name="warning" value="Warning">
    <input type="hidden" name="down" value="Down">
    <input type="hidden" name="downa" value="Down (Acknowledged)">
    <input type="hidden" name="paused" value="Paused  (paused)">
    <input type="submit" name="u" value="Up">
    <input type="submit" name="warn" value="Warning">
    <input type="submit" name="dow" value="Down">
    <input type="submit" name="pau" value="Paused">
</form>

<?php
if (isset($_POST["u"])) {
    $up = $_POST["up"];
    search($up);
}

if (isset($_POST["warn"])) {
    $warning = $_POST["warning"];
    search($warning);
}

if (isset($_POST["dow"])) {
    $down = $_POST["down"];
    $downa = $_POST["downa"];
    search($down);
    search($downa);
}

if (isset($_POST["pau"])) {
    $paused = $_POST["paused"];
    search($paused);
}

function search($str) {
    $url1 = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=probe,group,device,sensor,status&count=8729&username=Pim%20Bohm&password=P1mP1mP1mP1m");
    $url1 = json_decode($url1, true);
    for ($i = 0; $i < 8729; $i++) {
        if ($url1['sensors'][$i]['status'] == $str) {
            echo $url1['sensors'][$i]['probe'] . ", ";
            echo $url1['sensors'][$i]['group'] . ", ";
            echo $url1['sensors'][$i]['device'] . ", ";
            echo $url1['sensors'][$i]['sensor'] . ", ";
            echo $url1['sensors'][$i]['status'] . ", ";
            echo "<img src='img/$str.jpg' style='width:50px; height:50px;'><br><br>";
        }
    }
}
?>
</body>
</html>