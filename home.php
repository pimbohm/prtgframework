<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>navbar</title>
    <link href="css/navbar.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="navbar">
    <h1><a href="home.php">PRTG Visualisation Framework</a></h1>
    <a href="history.php">Historic</a>
    <a href="lumiusers.php">Users Lumiad</a>
    <a href="lumipinghq3.php">Ping Sensor Lumiad hq3</a>
    <div class="dropdown">
        <button class="dropbtn" onclick="myFunction()">Local Probe
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="myDropdown">
            <a href="localprobehs.php">Core Health Sensor</a>
            <a href="localprobef.php">Disk free Sensor</a>
            <a href="localprobeph.php">Probe Health Sensor</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" onclick="myFunctionm()">Sensors
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="myDropdownm">
            <a href="sensors.php">all Sensors</a>
            <a href="sensorssort.php">Sensorssort</a>
        </div>
    </div>
</div>

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunctionm() {
        document.getElementById("myDropdownm").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdownm");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>

</body>
</html>