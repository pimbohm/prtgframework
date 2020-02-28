<?php
$url = "https://prtg.lumiad.com/api/table.json?content=values&output=json&columns=datetime,value_,coverage&id=4966&noraw=1&usecaption=true=true&username=Pim%20Bohm&password=P1mP1mP1mP1m";
$url = file_get_contents($url);
$url = json_decode($url, true);
?>
<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript">

        function loadref(time)
        {
            setTimeout("location.reload(true);",time);
        }

    </script>
</head>
<body onload="loadref(60000)">
<?php
include "home.php";
?>
<div id="h1">
    <h1>Ping sensor lumi-hq-ap003</h1>
</div>
<?php
echo <<<TEKST
<table border="1">
    <tr>
        <th>Datetime</th>
        <th>Ping Time</th>
        <th>Minimum</th>
        <th>Maximum</th>
        <th>Packet Loss</th>
        <th>Downtime</th>
        <th>Coverage</th>
    </tr>
TEKST;
for ($i = 0; $i < 500; $i++) {
    echo "<tr>";
    echo "<td>" . $url["values"][$i]["datetime"] . "</td>";
    echo "<td>" . $url["values"][$i]["Ping Time"] . "</td>";
    echo "<td>" . $url["values"][$i]["Minimum"] . "</td>";
    echo "<td>" . $url["values"][$i]["Maximum"] . "</td>";
    echo "<td>" . $url["values"][$i]["Packet Loss"] . "</td>";
    echo "<td>" . $url["values"][$i]["Downtime"] . "</td>";
    echo "<td>" . $url["values"][$i]["coverage"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>