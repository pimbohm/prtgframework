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
<div id="up"></div>
<div id="warning"></div>
<div id="down"></div>
<div id="downa"></div>
<div id="paused"></div>

<?php
if (isset($_POST["u"])) {
    $up = $_POST["up"];
    search($up);
    echo '<script type="text/javascript">' .
        'document.getElementById("down").innerHTML = "Up = ' . $getal . '";' .
        '</script>';
}

if (isset($_POST["warn"])) {
    $warning = $_POST["warning"];
    search($warning);
    echo '<script type="text/javascript">' .
        'document.getElementById("warning").innerHTML = "Warning = ' . $getal . '";' .
        '</script>';
}

if (isset($_POST["dow"])) {
    $down = $_POST["down"];
    $downa = $_POST["downa"];
    search($down);
    $down2 = $getal;
    search($downa);
    $downa2 = $getal - $down2;
    echo '<script type="text/javascript">' .
        'document.getElementById("down").innerHTML = "Down = ' . $down2 . '";' .
        '</script>';
    echo '<script type="text/javascript">' .
        'document.getElementById("downa").innerHTML = "Down (Acknowledged) = ' . $downa2 .'";' .
        '</script>';
}

if (isset($_POST["pau"])) {
    $paused = $_POST["paused"];
    search($paused);
    echo '<script type="text/javascript">' .
        'document.getElementById("paused").innerHTML = "Paused  (paused) = ' . $getal . '";' .
        '</script>';
}

function search($str) {
    $url1 = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=probe,group,device,sensor,status&count=9018&username=Pim%20Bohm&password=P1mP1mP1mP1m");
    $url1 = json_decode($url1, true);
    $getal = 0;
    global $getal;
    for ($i = 0; $i < 9018; $i++) {
        if ($url1['sensors'][$i]['status'] == $str) {
            echo $url1['sensors'][$i]['probe'] . ", ";
            echo $url1['sensors'][$i]['group'] . ", ";
            echo $url1['sensors'][$i]['device'] . ", ";
            echo $url1['sensors'][$i]['sensor'] . ", ";
            echo $url1['sensors'][$i]['status'] . ", ";
            echo "<img src='img/$str.jpg' style='width:50px; height:50px;'><br><br>";
            $getal++;
        }
    }
}
?>
</body>
</html>