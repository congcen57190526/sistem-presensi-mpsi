@@ -0,0 +1,71 @@<br>
<?php
include '../utils/customFunction.php';
include '../utils/connect.php';

session_start();
date_default_timezone_set("Asia/Jakarta");
$user_id = $_SESSION['user_id'];
$mapelQuery = "SELECT * FROM mapel
	JOIN class ON mapel.mapel_class_id = class.class_id
	WHERE user_id=$user_id";
$mapelend = "SELECT * FROM mapel LEFT OUTER JOIN usert ON mapel.user_id = usert.user_id WHERE user_code = 2020";
$mapelEnd = mysqli_query($conn, $mapelend);
$mapelResult = mysqli_query($conn, $mapelQuery);

// while ($row = mysqli_fetch_assoc($mapelResult)) {
// 	$classId = $row['class_id'];
// 	$mapelName = $row['mapel_name'];
// 	$className = $row['class_name'];
// 	$mapelMeet = $row['mapel_meet'] + 1;
// }

// $memberQuery = "SELECT * FROM member WHERE member_class_id = $classId";
// $numQuery = "SELECT * FROM member WHERE member_class_id = $classId";
// $memberResult = mysqli_query($conn, $memberQuery);
// $numResult = mysqli_query($conn, $memberQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    function display_c() {
        var refresh = 1000; // Refresh rate in milliseconds
        mytime = setTimeout('display_ct()', refresh);
    }

    function display_ct() {
        var x = new Date();
        var hours = x.getHours();
        var minutes = x.getMinutes();
        var seconds = x.getSeconds();
        var current = hours + ":" + minutes + ":" + seconds;
        document.getElementById('ct').innerHTML = current;
        display_c();
        if (current >= "12:27:00"){
            alert("times up");
        }
        <?php
        $row = mysqli_fetch_assoc($mapelEnd);
        $mapelEndTime = $row['mapel_endtime'];
        $currentTime = date('G:i');
        if (strtotime($currentTime) >= strtotime($mapelEndTime)) {
            echo "alert('Time's up!');";
        }
        ?>
    }
</script>
<body onload=display_ct()>
    <a id="ct" onload="display_ct()">a</a><br>
	<a id="ct2" onload="display_ct()">a</a><br>
	<?php
    while($row = mysqli_fetch_assoc($mapelEnd)){
        echo(strtotime("G i")."<br>");  
        echo($row['mapel_endtime'])."<br>";
        echo(strtotime($row['mapel_endtime']));
    }
	
	?>
</body>
</html>