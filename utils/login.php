<?php

use LDAP\Result;

include './connect.php';
date_default_timezone_set('Asia/Jakarta');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["password"];
    $query = "SELECT * FROM usert WHERE user_code=$password";
    $query2 = "SELECT * FROM mapel LEFT OUTER JOIN usert ON mapel.user_id = usert.user_id WHERE user_code = $password GROUP BY mapel_name;";


    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);

    if ($result === false) {
        die("Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 3) { 
        header("Location: http://localhost/sistem-presensi-mpsi/pages/dashboard.php");
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<script type='text/javascript'>alert('data kosong');
        window.location.href='http://localhost/sistem-presensi-mpsi/';
        </script>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['user_role'] == 1) {
                while ($row2 = mysqli_fetch_assoc($result2)){
                    $_SESSION['user_code'] = $row['user_code'];
                    $_SESSION['user_role'] = $row['user_role'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_nip'] = $row['user_nip'];
                    $_SESSION['mapel_id'] = $row['mapel_id'];
                    $dbStart = strtotime($row2['mapel_starttime']);
                    $dbEnd = strtotime($row2['mapel_endtime']);
                    $dbDay = $row2['mapel_day'];
                    $cTime = date("H:i");
                    $cDay = date("l");
                    $now = strtotime("$cTime");
                }
                if (($now >= $dbStart) and ($now < $dbEnd) and ($cDay == $dbDay)) {
                    header("Location: http://localhost/sistem-presensi-mpsi/pages/dashboard.php");
                } else {
                    echo "<script type='text/javascript'>alert('tidak ada pelajaran saat ini');
                    window.location.href='http://localhost/sistem-presensi-mpsi/';
                    </script>";
                }
            } else {
                $_SESSION['user_code'] = $row['user_code'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_role'] = $row['user_role'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_nip'] = $row['user_nip'];
                header("Location: http://localhost/sistem-presensi-mpsi/pages/dashboardAdmin.php");
            }
        }
    }
}
