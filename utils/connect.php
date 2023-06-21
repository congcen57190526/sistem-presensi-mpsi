<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sistem_presensi_rpl';

$conn = new mysqli($host, $user, $password, $database);

if (!$conn) {
    die('Could not connect to database: ' . mysqli_connect_error());
}
