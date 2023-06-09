<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["password"];
    $query = "SELECT * FROM user WHERE user_code=$password";
    $query2 = "SELECT * FROM mapel ";

    $result = mysqli_query($conn, $query);
    if ($result === false) {
        die("Error: " . mysqli_error($connection));
    }


    if (mysqli_num_rows($result) == 0) {
        echo "<script type='text/javascript'>alert('data kosong');
        window.location.href='http://localhost/sistem-presensi-rpl/';
        </script>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['user_role'] == 1) {
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                $dbTime = strtotime($row2['mapel_starttime']);
                $now = strtotime("07:00"); //waktu sementara
                if ($dbTime > $now) {
                    echo "<script type='text/javascript'>alert('no');</script>";
                } else {
                    header("Location: http://localhost/sistem-presensi-rpl/pages/dashboard.php");
                }
            } else {
                header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php");
            }
        }
    }
    // $row = mysqli_fetch_assoc($result);
    // // $dbTime = strtotime($row['time_column']);
    // // $now = strtotime("07:00");
    // while($row = mysqli_fetch_assoc($result)){
    //     echo $row["mapel_id"];
    // }
    // if ($dbTime > $now){
    //     // header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php");
    // }
    // else{
    //     // echo "<script type='text/javascript'>alert('no');</script>";
    // }
}
?>
<!-- 1. pengajar -->
<!-- 2. admin -->