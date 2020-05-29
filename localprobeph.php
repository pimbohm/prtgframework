<?php
include "config.php";
$url = "https://prtg.lumiad.com/api/table.json?content=values&output=json&columns=datetime,value_,coverage&id=1003&noraw=1&usecaption=true&usecaption=true&username=$username&password=$password";
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
    <h1>Probe health local probe</h1>
</div>
<?php
echo <<<TEKST
<table border="1">
    <tr>
        <th>Datetime</th>
        <th>Health</th>
        <th>Message Queue</th>
        <th>Open Requests</th>
        <th>Probe Process CPU Load</th>
        <th>Handles</th>
        <th>Threads</th>
        <th>Interval Delay WMI</th>
        <th>Interval Delay SNMP</th>
        <th>Interval Delay non-WMI&SNMP</th>
        <th>Memory Usage</th>
        <th>Lost Flow Packets</th>
        <th>Syslog Buffer</th>
        <th>Data Storage Free</th>
        <th>Toplist Memory</th>
        <th>Trap Buffer</th>
        <th>Downtime</th>
        <th>Coverage</th>
    </tr>
TEKST;
for ($i = 0; $i < 500; $i++) {
    echo "<tr>";
    echo "<td>" . $url["values"][$i]["datetime"] . "</td>";
    echo "<td>" . $url["values"][$i]["Health"] . "</td>";
    echo "<td>" . $url["values"][$i]["Message Queue"] . "</td>";
    echo "<td>" . $url["values"][$i]["Open Requests"] . "</td>";
    echo "<td>" . $url["values"][$i]["Probe Process CPU Load"] . "</td>";
    echo "<td>" . $url["values"][$i]["Handles"] . "</td>";
    echo "<td>" . $url["values"][$i]["Threads"] . "</td>";
    echo "<td>" . $url["values"][$i]["Interval Delay WMI"] . "</td>";
    echo "<td>" . $url["values"][$i]["Interval Delay SNMP"] . "</td>";
    echo "<td>" . $url["values"][$i]["Interval Delay non-WMI&SNMP"] . "</td>";
    echo "<td>" . $url["values"][$i]["Memory Usage"] . "</td>";
    echo "<td>" . $url["values"][$i]["Lost Flow Packets"] . "</td>";
    echo "<td>" . $url["values"][$i]["Syslog Buffer"] . "</td>";
    echo "<td>" .$url["values"][$i]["Data Storage Free"] . "</td>";
    echo "<td>" . $url["values"][$i]["Toplist Memory"] . "</td>";
    echo "<td>" . $url["values"][$i]["Trap Buffer"] . "</td>";
    echo "<td>" . $url["values"][$i]["Downtime"] . "</td>";
    echo "<td>" . $url["values"][$i]["coverage"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
