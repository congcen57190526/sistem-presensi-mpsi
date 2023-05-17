<?php
include '../utils/customFunction.php';
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
    <script>
        function handleEndClass() {
            window.location.href = "http://localhost/sistem-presensi-rpl/";
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
                <h2 class="brownText">Selamat Datang Bapak Joko Susilo</h2>
                <div class="my-shadow" style="background-color: white; padding: 10px; border-radius: 10px;">
                    <img style="width: 60px; height: 60px;" src="https://1.bp.blogspot.com/-KNgLt5rNEv0/YJeYxR7R7EI/AAAAAAAALOU/Msfbq_pecacbL9__h0E3IeBlHVq8fW41QCLcBGAsYHQ/s600/Institut_Bisnis_Dan_Informatika_Kwik_Kian_Gie.png" alt="logo_kkg">
                </div>
            </div>
            <div style="display: flex; gap: 8px;">
                <button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled>Kalkulus</button>
                <button class="btn btn-success my-shadow" style="background-color: #D6E8DB; border: none; color: black;" disabled>IV - A</button>
            </div>
        </head>
        <br>
        <section class="my-shadow" style="height: 100%; overflow-y: scroll;background-color: #D6E8DB;">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th class="col-1">#</th>
                        <th class="col-6">Nama siswa</th>
                        <th class="col-2">NIS</th>
                        <th class="col-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 100; $i++) { ?>
                        <tr>
                            <th><?= $i ?></th>
                            <td><?= generateRandomName() ?> </td>
                            <td><?= generateRandomNumber() ?> </td>
                            <td>
                                <select class="form-select form-select-sm" style="width: 200px;" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Hadir</option>
                                    <option value="2">Izin</option>
                                    <option value="3">Sakit</option>
                                    <option value="4">Alpha</option>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <footer class="d-flex justify-content-end py-3">
            <button class="btn my-shadow" style="background-color: #D6E8DB;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">End Class</button>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Akhiri Kelas?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin mengakhiri kelas?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="handleEndClass()">Akhiri</button>
            </div>
        </div>
    </div>
</div>