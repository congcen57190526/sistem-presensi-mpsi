<?php
include '../utils/customFunction.php';
include '../utils/connect.php';
date_default_timezone_set("Asia/Jakarta");
session_start();
// $user_id = $_SESSION['user_id'];
$mapel_id = $_SESSION['mapel_id'];
// $user_nip = $_SESSION['user_nip'];
$mapelQuery = "SELECT * FROM mapel
JOIN class ON mapel.mapel_class_id = class.class_id
WHERE mapel_id=$mapel_id";
$mapelend = "SELECT mapel_endtime FROM mapel
JOIN class ON mapel.mapel_class_id = class.class_id
WHERE mapel_id=$mapel_id";
$mapelEnd = mysqli_query($conn, $mapelend);
$mapelResult = mysqli_query($conn, $mapelQuery);

while ($row = mysqli_fetch_assoc($mapelResult)) {
	$classId = $row['class_id'];
	$mapelName = $row['mapel_name'];
	$className = $row['class_name'];
	$mapelMeet = $row['mapel_meet'] + 1;
}

$memberQuery = "SELECT * FROM member WHERE member_class_id = $classId";
$numQuery = "SELECT * FROM member WHERE member_class_id = $classId";
$memberResult = mysqli_query($conn, $memberQuery);
$numResult = mysqli_query($conn, $memberQuery);

if (!isset($_SESSION['user_code'])) {
	echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu');
        window.location.href='http://localhost/sistem-presensi-rpl/';
        </script>";
}
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

		/* Clearfix (clear floats) */
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
	<script>
		// function time(){
		// var now = new Date();
		// var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 0, 0, 0) - now;
		// if (millisTill10 < 0) {
		// 	millisTill10 += 86400000; // it's after 10am, try 10am tomorrow.
		// }
		// setTimeout(function(){alert("It's 10am!")}, millisTill10);
		// }
		function display_c() {
			var refresh = 1000; // Refresh rate in milli seconds
			mytime = setTimeout('display_ct()', refresh)
		}

		function display_ct() {
			var x = new Date()
			var hours = x.getHours();
			var minutes = x.getMinutes();
			var seconds = x.getSeconds();
			var current = hours + ":" + minutes + ":" + seconds;
			document.getElementById('ct').innerHTML = current;
			display_c();
			if (current == "7:45:00" || current == "8:30:00" || current == "9:15:00" || current == "10:30:00" || current == "11:15:00" || 
			current == "12:00:00" || current == "13:15:00" || current == "14:15:00"){
            // alert("times up");
			Swal.fire({
				title: "Kelas Sudah Berakhir",
				confirmButtonText: "Tutup Notifikasi",
				icon: "info"
			});
        }
		}

		function searchFunction() {
			var input, filter, t, td, a, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			t = document.getElementById("table");
			tr = t.getElementsByTagName("tr");
			td = t.getElementsByTagName("td");
			var check = !isNaN(parseFloat(filter)) && isFinite(filter);

			if (!check) {
				for (i = 0; i < td.length; i++) {
					a = tr[i].getElementsByTagName("td")[0];
					txtValue = a.textContent || a.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			} else {
				for (i = 0; i < td.length; i++) {
					a = tr[i].getElementsByTagName("td")[1];
					txtValue = a.textContent || a.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}


		function sortTable(n) {
			var table, rows, switching, i, x, y, shouldSwitch;
			table = document.getElementById("table");
			switching = true;
			while (switching) {
				switching = false;
				rows = table.rows;
				for (i = 0; i < (rows.length - 1); i++) {
					shouldSwitch = false;
					if (n == 1) {
						x = rows[i].getElementsByTagName("TD")[0];
						y = rows[i + 1].getElementsByTagName("TD")[0];
					} else {
						x = rows[i].getElementsByTagName("TD")[1];
						y = rows[i + 1].getElementsByTagName("TD")[1];
					}
					if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
						shouldSwitch = true;
						break;
					}
				}
				if (shouldSwitch) {
					rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					switching = true;
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
			<div style="display: flex; gap: 8px; justify-content: space-between;" class="mt-3">
				<div>
					<button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled><?= $mapelName ?></button>
					<button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled><?= $className ?></button>
					<button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled>Pertemuan ke-<?= $mapelMeet ?></button>
				</div>
				<h5 id="ct" onload="display_ct()"></h5>
				<h5 class="brownText"><?= generateDate() ?></h5>
			</div>
		</head>
		<br>
		<div class="input-group mb-3 my-shadow">
			<span class="input-group-text" id="inputGroupPrepend" style="background-color: #D6E8DB;">&#128269</span>
			<input style="background-color: #D6E8DB; outline: none; box-shadow: none; " type="text" class="form-control" id="myInput" aria-describedby="inputGroupPrepend" placeholder="Search for Name/NIS" onkeyup="searchFunction()">
		</div>
		<section class="my-shadow" style="height: 100%; overflow-y: scroll;background-color: #D6E8DB;">
			<div class="row">
				<div class="column" style="width:3%;">
					<table class="no table table-striped">
						<tr style="height:41px">
							<th class="col-1">No</th>
						</tr>
						<?php $i = 1; ?>
						<?php while ($rowMember = mysqli_fetch_assoc($numResult)) { ?>
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
								<th class="col-6">Nama siswa<button type="button" style="border:none;background:none;" onclick="sortTable(1)">˅</button></th>
								<th class="col-2">NIS<button type="button" style="border:none;background:none;" onclick="sortTable(2)">˅</button></th>
								<th class="col-2">Status</th>
							</tr>
						</thead>
						<form action="../utils/endClass.php" method="POST">
							<tbody id="table">
								<?php $i = 1; ?>
								<?php while ($rowMember = mysqli_fetch_assoc($memberResult)) { ?>
									<tr>
										<td name="name" id="name"><?= $rowMember['member_name'] ?></td>
										<td><?= $rowMember['member_code'] ?></td>
										<td>
											<select name="status[]" id="status" class="form-select form-select-sm" style="width: 200px;" aria-label="Default select example">
												<!-- <option>Open this select menu</option> -->
												<option selected value="H">Hadir</option>
												<option value="I">Izin</option>
												<option value="S">Sakit</option>
												<option value="A">Alpha</option>
											</select>
										</td>
									</tr>
									<!-- MODAL -->
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Akhiri Kelas?</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Apakah anda yakin ingin mengakhiri kelas?
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Akhiri</button>
												</div>
											</div>
										</div>
									</div>
									<?php $data[] = array(
										'member_name' => $rowMember['member_name'],
										'week' => $mapelMeet,
									);
									$jsonData = json_encode($data);

									?>
									<?php $i++; ?>
								<?php } ?>

							</tbody>
							<input type="text" name="mapelMeet" id="mapelMeet" value="<?= $mapelMeet ?>" hidden>
							<textarea type="text" id="jsonData" name="jsonData" hidden><?= $jsonData ?></textarea>
						</form>
					</table>
				</div>
			</div>
		</section>
		<footer class="d-flex justify-content-end py-3">
			<button class="btn my-shadow" style="background-color: #D6E8DB;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">End Class</button>
		</footer>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>