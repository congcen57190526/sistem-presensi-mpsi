<?php
include '../utils/customFunction.php';
include '../utils/connect.php';
date_default_timezone_set("Asia/Jakarta");
session_start();
date_default_timezone_set("Asia/Jakarta");
$user_id = $_SESSION['user_id'];

$mapelQuery = "SELECT * FROM record JOIN mapel ON mapel.mapel_id = record.record_mapel_id 
	JOIN usert ON mapel.user_id = usert.user_id 
	JOIN class ON mapel.mapel_class_id = class.class_id GROUP BY mapel_name;";
$usernipQ = "SELECT * from usert WHERE user_id = $user_id";

$numResult = mysqli_query($conn, $mapelQuery);
$userNip = mysqli_query($conn, $usernipQ);
$mapelResult = mysqli_query($conn, $mapelQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/shadow.css">
	<link rel="stylesheet" href="../css/color.css">
	<link rel="stylesheet" href="../css/customScrollbar.css">
	<style>
		.row {
			margin-left: 0px;
			margin-right: 0px;
		}

		.column {
			float: left;
			width: 97%;
			padding: 0px;
		}

		.row::after {
			content: "";
			clear: both;
			display: table;
		}

		table {
			border-collapse: collapse;
			border-spacing: 100px;
			width: 100%;
			border: 1px solid #ddd;
		}

		th,
		td {
			text-align: left;
			padding: 0px;
		}
	</style>
	<script>
		function handleDetail(id) {
			window.location.href = `http://localhost/sistem-presensi-mspi/pages/infoPage.php?search=${id}`;
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

<body onload="display_ct()" class="creamBg" style="display: flex;
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

		</head>
		<br>
		<div class="input-group mb-3 my-shadow">
			<span class="input-group-text" id="inputGroupPrepend" style="background-color: #D6E8DB;">&#128269</span>
			<input style="background-color: #D6E8DB; outline: none; box-shadow: none; " type="text" class="form-control" id="myInput" aria-describedby="inputGroupPrepend" placeholder="Search for Names.." onkeyup="searchFunction()">
		</div>
		<section class="my-shadow" style="height: 100%; overflow-y: scroll;background-color: #D6E8DB;">
			<div class="row">
				<div class="column" style="width:3%;">
					<table class="no table table-striped">
						<tr style="height:41px">
							<th class="col-1">No</th>
						</tr>
						<?php $i = 1; ?>
						<?php while ($rowMember = mysqli_fetch_assoc($mapelResult)) { ?>
							<tr style="height:47.6px">
								<td><?= $i ?></td>
							</tr>
							<?php $i++; ?>
						<?php } ?>
					</table>
				</div>
				<div class="column">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th class="col-5">Mata Pelajaran</th>
								<th class="col-2">Guru</th>
								<th class="col-2">Kelas</th>
								<th class="col-2">Action</th>
							</tr>
						</thead>
						<tbody id="table">
							<?php $i = 1; ?>
							<?php while ($rowMember = mysqli_fetch_assoc($numResult)) { ?>
								<tr>
									<td><?= $rowMember['mapel_name'] ?></td>
									<td><?= $rowMember['user_name'] ?></td>
									<td><?= $rowMember['class_name'] ?></td>
									<td><button class="btn btn-primary btn-sm" onclick="handleDetail(<?= $rowMember['record_id'] ?>)">Detail</button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<footer class="d-flex justify-content-end py-3">
			<button class="btn my-shadow" style="background-color: #D6E8DB;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Log out</button>
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
				<h1 class="modal-title fs-5" id="exampleModalLabel">Keluar?</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah anda yakin ingin keluar?
			</div>
			<div class="modal-footer">
				<form action="../utils/adminLogout.php" method="POST">
					<button type="submit" class="btn btn-primary">Keluar</button>
				</form>
			</div>
		</div>
	</div>
</div>