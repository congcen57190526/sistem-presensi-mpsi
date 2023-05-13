<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_mahasiswa';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('Could not connect to database: ' . mysqli_connect_error());
}
