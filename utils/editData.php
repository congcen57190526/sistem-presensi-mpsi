<?php

include '../utils/connect.php';
$editedData = $_POST['classData'];

$memberName = $_POST['member_name'];
$week = $_POST['week'];
$status = $_POST['status'];
$recordId = $_POST['record_id'];
$data = json_decode($editedData, true);

foreach ($data as &$item) {
    if ($item['member_name'] === $memberName && $item['week'] == $week) {
        $item['status'] = $status;
        break;
    }
}

$jsonData = json_encode($data);
$q = "UPDATE record SET record_attend='$jsonData' WHERE record_id=$recordId";
mysqli_query($conn, $q);
header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php?search=$recordId");
exit();
