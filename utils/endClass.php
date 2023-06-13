<?php
session_start();
session_destroy();

$attendList = $_POST["jsonData"];

$existingArray = json_decode($attendList, true);
foreach ($existingArray as $index => &$object) {
    $statusArray = $_POST["status"][$index];
    $object['status'] = $statusArray;
}

$modifiedJsonString = json_encode($existingArray);
echo $modifiedJsonString;

header("Location: http://localhost/sistem-presensi-rpl/pages/infoPage.php?search=1");
exit();
