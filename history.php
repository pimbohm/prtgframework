<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date picker</title>
    <style>
        #h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
include "config.php"; // get your ptg details
include "home.php"; // get the navigation bar
?>
<div id="h1">
    <h1>Historic data</h1>
</div>
<form method="post"> <!-- form to select the starting and endtime -->
    start: <input type="datetime-local" name="sdate"><br>
    end: <input type="datetime-local" name="edate"><br>
    interval:
    <select name="interval">
        <option value="3600">60 minutes/1 hour</option>
    </select>
    <input type="submit" name="ok">
</form>
<?php
if (isset($_POST["ok"])) { // show the results if the button is pressed.
    $sdatetime1 = explode("T", $_POST["sdate"]);
    $sdatetime2 = explode(":", $sdatetime1[1]);
    $sdateformat = $sdatetime1[0] . "-" . $sdatetime2[0] . "-" . "$sdatetime2[1]". "-00";

    $edatetime1 = explode("T", $_POST["edate"]);
    $edatetime2 = explode(":", $edatetime1[1]);
    $edateformat = $edatetime1[0] . "-" . $edatetime2[0] . "-" . "$edatetime2[1]". "-00";

    $interval = $_POST["interval"];

    // make the api call to get the data
    $url = file_get_contents("https://prtg.lumiad.com/historicdata_html.htm?id=34839&sdate=$sdateformat&edate=$edateformat&avg=$interval&pctavg=300&pctshow=false&pct=95&pctmode=false&hide=NaN&username=$username&password=$password");
    echo $url;
}
?>
</body>
</html>