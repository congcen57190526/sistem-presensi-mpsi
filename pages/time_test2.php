<?php
include '../utils/connect.php';
$mapelend = "SELECT * FROM mapel LEFT OUTER JOIN usert ON mapel.user_id = usert.user_id WHERE user_code = 2020";
$Timme = mysqli_query($conn, $mapelend);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Countdown Timer</title>
</head>
<body>
    <h1>Countdown Timer</h1>
    <div id="timer"></div>
    <div id="time"></div>

    <script>
        // Set the countdown time (in seconds)
        <?php
        $hours = date("G");
        $minutes = date("i");
        $secs    = date("s");
        $totalSecs   = ($hours * 60*60) + ($minutes * 60) + $secs; 
        // $row = mysqli_fetch_assoc($Time);
        // echo $row['mapel_endtime'];

        // $statustimeUNIX = Strtotime(date("hh:mm:ss",$row['mapel_endtime']));
        // $currenttimeUNIX = Strtotime(date("hh:mm:ss"));

        // echo $statustimeUNIX."<br>";
        // echo $currenttimeUNIX."<br>";
        // $DiffInSeconds = $currenttimeUNIX - $statustimeUNIX;
        // echo "$DiffInSeconds";
        ?>
        // var time = <?php //echo $row['mapel_endtime'];?>
        // document.getElementById('time').innerHTML = time;
        var countdownTime = <?php echo $totalSecs; ?>;

        // Function to start the countdown
        function startCountdown() {
            var timerElement = document.getElementById('timer');

            // Update the timer every second
            var countdownInterval = setInterval(function() {
                // Calculate minutes and seconds
                var minutes = Math.floor(countdownTime / 60);
                var seconds = countdownTime % 60;

                // Display the remaining time
                timerElement.innerHTML = 'Time Remaining: ' + minutes + ' minutes ' + seconds + ' seconds';

                // Check if the countdown is finished
                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                    timerElement.innerHTML = 'Time is up!';
                    alert('Time is up!');
                }

                // Decrease the countdown time
                countdownTime--;
            }, 1000);
        }

        // Start the countdown when the page loads
        window.onload = startCountdown;
    </script>
</body>
</html>
