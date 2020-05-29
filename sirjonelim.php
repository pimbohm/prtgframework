<?php
include "config.php"; // get your ptg details

$sensors = file_get_contents("https://prtg.lumiad.com/api/table.json?content=sensors&output=json&columns=objid, sensor&id=7401&noraw=1&usecaption=true&count=100000&username=$username&password=$password");
$sensors = json_decode($sensors, true);
$sensorscount = count($sensors["sensors"]);
$idvalues  = [];
$wlanvalues  = [];
$uservalues  = [];
?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sirjon</title>
</head>
<body>
<?php
include "home.php"; // get the navigation bar
?>
<div id="h1">
    <h1>Sirjonelim</h1>
</div>
<?php
for ($i = 0; $i < $sensorscount; $i++) {
    $id = $sensors["sensors"][$i]["objid"];
    $wlan = $sensors["sensors"][$i]["sensor"];
    if ($wlan == "WLAN 1" ||
        $wlan == "WLAN2") {
//        echo $id . ", " . $wlan . "<br>";
        array_push($idvalues, $id);
        array_push($wlanvalues, $wlan);
    }
}

$idcount = count($idvalues);

for ($i = 0; $i < $idcount; $i++) {
    $channels = file_get_contents("https://prtg.lumiad.com/api/table.json?content=channels&output=json&columns=name,lastvalue_&id=$idvalues[$i]&count=100000&username=$username&password=$password");
    $channels = json_decode($channels, true);
    $usercount = $channels["channels"][10]["lastvalue"];
    array_push($uservalues, $usercount);
}

$user_count = array_sum($uservalues);
echo "Total user count: " . $user_count;
?>
</body>
</html>