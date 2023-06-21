<?php
date_default_timezone_set("Asia/Jakarta");
function generateRandomNumber()
{
    $number = '';

    for ($i = 0; $i < 10; $i++) {
        $digit = mt_rand(0, 9);
        $number .= $digit;
    }

    return $number;
}

function generateDate()
{

    $currentDate = date("D d F Y");
    echo $currentDate;
}

function mergerJSONdata($data1, $data2)
{
    $data1Array = json_decode($data1, true);
    $data2Array = json_decode($data2, true);
    $mergedData = array_merge($data1Array, $data2Array);
    return $mergedData;
}
