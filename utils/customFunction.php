<?php
function generateRandomName()
{
    $names = ['John', 'Emily', 'Michael', 'Emma', 'Daniel', 'Olivia', 'David', 'Sophia', 'James', 'Ava'];
    $surnames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor'];

    $randomName = $names[array_rand($names)];
    $randomSurname = $surnames[array_rand($surnames)];

    return $randomName . ' ' . $randomSurname;
}

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
    date_default_timezone_set("Asia/Jakarta");
    $currentDate = date("D d F Y");
    echo $currentDate;
}

function timeUp(){
    if (date("G i") == "20:38"){
        echo "<script type='text/javascript'>alert('Times Up');window.location.href='http://localhost/sistem-presensi-rpl/'</script>";
    }
}

function generateRandomBoolean()
{
    $randomNumber = mt_rand(0, 1);
    $randomValue = ($randomNumber === 1) ? true : false;
    return $randomValue;
}
