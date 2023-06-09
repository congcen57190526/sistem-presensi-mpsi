<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["password"];
    $query = "SELECT * FROM user WHERE user_code=$password";
    
    $result = mysqli_query($conn,$query);
    if ($result === false) {
        die("Error: " . mysqli_error($connection));
    }
    if (mysqli_num_rows($result) == 0) {
        header("Location: http://localhost/sistem-presensi-rpl/pages/emptyPage.php");
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            if($row['user_role'] == 1) {
                header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php");
            } else {
                header("Location: http://localhost/sistem-presensi-rpl/pages/dashboard.php");
            }
            }
    }
}
?>
