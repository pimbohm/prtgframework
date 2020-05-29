<?php
include "config.php";
$url = "https://prtg.lumiad.com/api/table.json?content=values&output=json&columns=datetime,value_,coverage&id=1005&noraw=1&usecaption=true&username=$username&password=$password";
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
    <h1>Disk free local probe</h1>
</div>
<?php
echo <<<TEKST
<table border="1">
    <tr>
        <th>Datetime</th>
        <th>Total</th>
        <th>Free Bytes C</th>
        <th>Free Space C</th>
        <th>Free Bytes E</th>
        <th>Free Space E</th>
        <th>Free Bytes F</th>
        <th>Free Space F</th>
        <th>Free Bytes G</th>
        <th>Free Space G</th>
        <th>Downtime</th>
        <th>Coverage</th>
    </tr>
TEKST;
for ($i = 0; $i < 500; $i++) {
    echo "<tr>";
    echo "<td>" . $url["values"][$i]["datetime"] . "</td>";
    echo "<td>" . $url["values"][$i]["Total"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Bytes C:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Space C:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Bytes E:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Space E:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Bytes F:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Space F:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Bytes G:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Free Space G:"] . "</td>";
    echo "<td>" . $url["values"][$i]["Downtime"] . "</td>";
    echo "<td>" . $url["values"][$i]["coverage"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
