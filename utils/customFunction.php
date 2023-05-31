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

function generateDate(){
    $currentDate = date('D I F Y');
    echo $currentDate;
}
