<?php
include '../utils/connect.php';

session_start();
session_destroy();
// attend data
$attendList = $_POST["jsonData"];
$existingArray = json_decode($attendList, true);
foreach ($existingArray as $index => &$object) {
    $statusArray = $_POST["status"][$index];
    $object['status'] = $statusArray;
}
$modifiedJsonString = json_encode($existingArray);

$q = "UPDATE record SET record_attend='$modifiedJsonString' WHERE record_id=2";
mysqli_query($conn, $q);

header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php?search=1");
exit();
