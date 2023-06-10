<?php

use LDAP\Result;

include './connect.php';
date_default_timezone_set('Asia/Jakarta');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["password"];
    $query = "SELECT * FROM usert WHERE user_code=$password";
    $query2 = "SELECT usert.user_id, usert.user_code, usert.mapel_id, mapel.mapel_day, mapel.mapel_starttime, mapel.mapel_endtime 
    FROM mapel LEFT OUTER JOIN usert ON mapel.user_id = usert.user_id WHERE user_code = $password;";
    // $query2 = "SELECT * FROM mapel WHERE";
    // $query3 = "SELECT user_id FROM usert t1 WHERE EXISTS (SELECT user_id FROM mapel t2 WHERE t2.user_id = t1.user_id);";

    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);

    if ($result === false) {
        die("Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 3) { //untuk ke dashboard tanpa perlu waktu spesifik
        header("Location: http://localhost/sistem-presensi-rpl/pages/dashboard.php");
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<script type='text/javascript'>alert('data kosong');
        window.location.href='http://localhost/sistem-presensi-rpl/';
        </script>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['user_role'] == 1) {
                // session variable
                $_SESSION['user_code'] = $row['user_code'];
                $_SESSION['user_role'] = $row['user_role'];
                $row2 = mysqli_fetch_assoc($result2);
                $dbStart = strtotime($row2['mapel_starttime']);
                $dbEnd = strtotime($row2['mapel_endtime']);
                $dbDay = $row2['mapel_day'];
                $cTime = date("H:i");
                $cDay = date("l");
                $now = strtotime("$cTime"); //waktu
                // comment from here
                // echo $row2['mapel_starttime']."<br>";
                // echo $row2['mapel_endtime']."<br>";
                // echo $dbStart."<br>";
                // echo $dbEnd."<br>";
                // // echo strtotime("$cDay")."<br>";
                // echo $now."<br>";
                // echo $now." >= ".$dbStart." and ".$now." < ".$dbEnd."<br>"; 
                // if ($now >= $dbStart){
                //     echo "true1";
                // }
                // if ($now < $dbEnd){
                //     echo "true2";
                // }
                // if ($cDay == $dbDay){
                //     echo "true3<br>";
                //     echo $dbDay;
                //     echo $cDay;
                // }
                // break;
                // comment to here
                if (($now >= $dbStart) and ($now < $dbEnd) and ($cDay == $dbDay)) {
                    header("Location: http://localhost/sistem-presensi-rpl/pages/dashboard.php");
                } else {
                    echo "<script type='text/javascript'>alert('tidak ada pelajaran saat ini');
                    window.location.href='http://localhost/sistem-presensi-rpl/';
                    </script>";
                }
            } else {
                $_SESSION['user_code'] = $row['user_code'];
                $_SESSION['user_role'] = $row['user_role'];
                header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php");
            }
        }
    }
}
?>
<!-- 1. pengajar -->
<!-- 2. admin -->