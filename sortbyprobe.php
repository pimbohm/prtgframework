<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sensors</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "config.php";
include "home.php";
?>
<div id="h1">
    <h1>Sort By Probe</h1>
</div>
<?php
$probe = file_get_contents("https://prtg.lumiad.com/api/table.json?content=probes&columns=objid,name&filter_parentid=0&count=100000&username=$username&password=$password");
$probe = json_decode($probe, true);
$probecount = count($probe["probes"]);

echo "<div id='sensorsbyprobe'>";
echo "<form method='post'>";
for ($i = 0; $i < $probecount; $i++) {
    echo $probe["probes"][$i]["name"];
    echo "<input type='checkbox' name='id[]' value='".$probe["probes"][$i]["objid"]."'><br>";
}
echo "<input type='submit' name='ok' value='Vieuw Sensordata'>";
echo "</form>";
echo "</div>";
echo "<br><br>";

if (isset($_POST['ok'])) {

    $id = $_POST['id'];
    foreach ($id as $i) {
        $sensor = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=objid,probe,group,device,sensor,status,message,lastvalue,priority,favorite&id=$i&count=100000&noraw=1&usecaption=true&username=Pim%20Bohm&password=P1mP1mP1mP1m");
        $sensor = json_decode($sensor, true);
        $sensorcount = count($sensor["sensors"]);
        echo "<hr>";
        echo "<br><br>";
        for ($x = 0; $x < $sensorcount; $x++) {
            echo $sensor["sensors"][$x]["probe"] . "<br>";
            echo $sensor["sensors"][$x]["group"] . "<br>";
            echo $sensor["sensors"][$x]["device"] . "<br>";
            echo $sensor["sensors"][$x]["sensor"] . "<br>";
            echo $sensor["sensors"][$x]["status"] . "<br><br>";
        }
    }
}
?>
</body>
</html>
