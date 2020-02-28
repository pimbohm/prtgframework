<?php
$url = "https://prtg.lumiad.com/api/table.json?content=values&output=json&columns=datetime,value_,coverage&id=1002&noraw=1&usecaption=true&username=Pim%20Bohm&password=P1mP1mP1mP1m";
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
    <h1>Core health local probe</h1>
</div>
<?php
echo <<<TEKST
<table border="1">
    <tr>
        <th>Datetime</th>
        <th>Health</th>
        <th>Free Virtual Memory</th>
        <th>Free Page File Memory</th>
        <th>Free Physical Memory</th>
        <th>Committed Memory</th>
        <th>CPU Load</th>
        <th>Handles</th>
        <th>Threads</th>
        <th>Raw Data Buffer</th>
        <th>Maintenance Days</th>
        <th>Age Of Code</th>
        <th>Configuration Last Saved</th>
        <th>Downtime</th>
        <th>Coverage</th>
    </tr>
TEKST;
for ($i = 0; $i < 500; $i++) {
    echo "<tr>";
    echo "<td>" . $url["values"][$i]["datetime"] . "</td>";
    echo "<td>" . $url["values"][$i]["Health"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Virtual Memory"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Page File Memory"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Physical Memory"] . "</td>";
    echo "<td>" . $url["values"][$i]["Committed Memory"] . "</td>";
    echo "<td>" . $url["values"][$i]["CPU Load"] . "</td>";
    echo "<td>" . $url["values"][$i]["Handles"] . "</td>";
    echo "<td>" . $url["values"][$i]["Threads"] . "</td>";
    echo "<td>" . $url["values"][$i]["Raw Data Buffer"] . "</td>";
    echo "<td>" . $url["values"][$i]["Maintenance Days"] . "</td>";
    echo "<td>" .$url["values"][$i]["Age of Code"] . "</td>";
    echo "<td>" . $url["values"][$i]["Configuration Last Saved"] . "</td>";
    echo "<td>" . $url["values"][$i]["Downtime"] . "</td>";
    echo "<td>" . $url["values"][$i]["coverage"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
