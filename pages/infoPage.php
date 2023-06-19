<?php
include '../utils/connect.php';
include '../utils/customFunction.php';

session_start();

$search = $_GET['search'];
$recordQuery = "SELECT * FROM record 
JOIN mapel ON mapel.mapel_id = record.record_mapel_id 
JOIN class ON mapel.mapel_class_id = class.class_id WHERE record_id = $search";
$recordResult = mysqli_query($conn, $recordQuery);

while ($row = mysqli_fetch_assoc($recordResult)) {
    $decodedData = json_decode($row['record_attend'], true);
    $mapelName = $row['mapel_name'];
    $className = $row['class_name'];
}
$groupedData = [];
if ($decodedData != null){
    foreach ($decodedData as $data) {

        $groupedData[$data['member_name']][$data['week']] = $data['status'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/shadow.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/customScrollbar.css">
    <script>
        function handleExit() {
            window.location.href = "http://localhost/sistem-presensi-rpl/";
        }

        function goBack() {
            history.back();
        }

		function searchFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("table");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
    </script>
</head>

<body class="creamBg" style="display: flex;
            justify-content: center;
            padding: 20px;
            height: 100vh;">
    <div class="container d-flex flex-column justify-content-between">

        <head style="margin-bottom: 20px;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <h2 class="brownText"><?= $_SESSION['user_nip'] ?> - <?= $_SESSION['user_name'] ?></h2>
                <div class="my-shadow" style="background-color: white; padding: 10px; border-radius: 10px;">
                    <img style="width: 60px; height: 60px;" src="https://1.bp.blogspot.com/-KNgLt5rNEv0/YJeYxR7R7EI/AAAAAAAALOU/Msfbq_pecacbL9__h0E3IeBlHVq8fW41QCLcBGAsYHQ/s600/Institut_Bisnis_Dan_Informatika_Kwik_Kian_Gie.png" alt="logo_kkg">
                </div>
            </div>
            <div style="display: flex; gap: 8px; justify-content: space-between;" class="mt-3">
                <div>
                    <button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled><?= $mapelName ?></button>
                    <button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled><?= $className ?></button>
                </div>
                <h5 class="brownText"><?= generateDate() ?></h5>
            </div>
        </head>
        <br>
        <div class="input-group mb-3 my-shadow">
            <span class="input-group-text" id="inputGroupPrepend" style="background-color: #D6E8DB;">&#128269</span>
            <input style="background-color: #D6E8DB; outline: none; box-shadow: none; " type="text" class="form-control" id="myInput" aria-describedby="inputGroupPrepend" placeholder="Search for names.." onkeyup="searchFunction()">
        </div>
        <section class="my-shadow" style="height: 100%; overflow-y: scroll;background-color: #D6E8DB;">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th class="col-1">#</th>
                        <th>Nama siswa</th>
                        <?php for ($x = 1; $x <= 16; $x++) { ?>
                            <td>
                                <?= $x ?>
                            </td>
                        <?php }  ?>
                        <?php if (isset($_SESSION['user_code']) && $_SESSION['user_role'] == 2) { ?>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody id="table">
                    <?php $rowNumber = 1; ?>
                    <?php foreach ($groupedData as $memberName => $weekData) : ?>
                        <tr>
                            <td><?php echo $rowNumber++; ?></td>
                            <td><?php echo $memberName; ?></td>
                            <?php for ($x = 1; $x <= 16; $x++) { ?>
                                <td><?php echo $weekData[$x] ?? ''; ?></td>
                            <?php }  ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <footer class="d-flex justify-content-end py-3">
            <?php if ($_SESSION['user_role'] == 1) { ?>
                <button class="btn my-shadow" style="background-color: #D6E8DB;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Exit</button>
            <?php } else { ?>
                <button class="btn my-shadow" style="background-color: #D6E8DB;" type="button" onclick="goBack()">Back</button>
            <?php } ?>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Logout?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin Logout?
            </div>
            <div class="modal-footer">

                <form action="../utils/adminLogout.php">
                    <button type="submit" class="btn btn-primary">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>