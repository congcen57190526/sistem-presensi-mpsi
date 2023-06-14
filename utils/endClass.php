<?php
include '../utils/connect.php';

session_start();
// attend data
$attendList = $_POST["jsonData"];
$meetke = $_POST["mapelMeet"];
$existingArray = json_decode($attendList, true);
foreach ($existingArray as $index => &$object) {
    $statusArray = $_POST["status"][$index];
    $object['status'] = $statusArray;
}
$modifiedJsonString = json_encode($existingArray);
$mapelId = $_SESSION['mapel_id'];
$recordQuery = "SELECT * FROM record WHERE record_mapel_id=$mapelId";
$recordResult = mysqli_query($conn, $recordQuery);
while ($row = mysqli_fetch_assoc($recordResult)) {
    $recordId = $row['record_id'];
}
$q = "UPDATE record SET record_attend='$modifiedJsonString' WHERE record_id=$recordId";
$mapelQ = "UPDATE mapel SET mapel_meet='$meetke' WHERE mapel_id=$mapelId";
mysqli_query($conn, $q);
mysqli_query($conn, $mapelQ);
session_destroy();
header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php?search=$recordId");
exit();
