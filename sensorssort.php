<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sensorssort</title>
</head>
<body>
<?php
include "home.php"; // get the navigation bar
?>
<div id="h1">
    <h1>All Sensors</h1>
</div>
<form method="post">
    <input type="hidden" name="up" value="Up">
    <input type="hidden" name="warning" value="Warning">
    <input type="hidden" name="down" value="Down">
    <input type="hidden" name="downa" value="Down (Acknowledged)">
    <input type="submit" name="u" value="Up">
    <input type="submit" name="warn" value="Warning">
    <input type="submit" name="dow" value="Down">
</form>
<div id="up"></div>
<div id="warning"></div>
<div id="down"></div>
<div id="downa"></div>

<?php
// selected all sensors with selected status
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

function search($str) {
    include "config.php"; // get your ptg details

    // make an api call
    $url1 = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=probe,group,device,sensor,status&count=100000&username=$username&password=$password");
    $url1 = json_decode($url1, true);
    $count = count($url1['sensors']);
    $getal = 0;
    global $getal;
    for ($i = 0; $i < $count; $i++) {
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