<?php
require 'utils/connect.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>

<body>
    <h1>MAIN PAGE</h1>
    <?php
    while ($row = mysqli_fetch_assoc($result)) :
    ?>
        <?= $row["nama"]; ?>
    <?php
    endwhile;
    ?>
    <!-- WELCOME PAGE -->
</body>

</html>