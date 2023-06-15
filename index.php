<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/shadow.css">
</head>
<script>
    function login() {
        //var x = document.fform.inp.value;
        // window.location.href = "pages/dashboard.php";
    }
</script>

<body>
    <div class="bg">
        <form align="center" class="form" action="./utils/login.php" method="POST">
            <h1 style="color: #936D49">Login</h1><br>
            <input class="login my-shadow" name="password" id="password" type="password" placeholder="KODE" required><br><br>
            <button class="submit my-shadow" type="submit">Submit</button>
        </form>
        <!-- <a href="./pages/time_test.php">time test</button><br> -->
        <!-- <a href="./pages/dashboardAdmin.php">admindashboard</button><br> -->
        <!-- <a href="./pages/infoPage.php">infopage</button> -->
    </div>
</body>

</html>