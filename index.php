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
        window.location.href = "pages/dashboard.php";
    }

    function info() {
        window.location.href = "pages/infoPage.php"
    }
</script>

<body>
    <div class="bg">
        <form align="center" class="form">
            <h1 style="color: #936D49">Login</h1><br>
            <input class="login my-shadow" name="inp" type="text" placeholder="Kode Guru"><br><br>
            <input class="login my-shadow" type="password" placeholder="Password"><br><br>
            <button class="submit my-shadow" type="button" onclick="login()">Submit</button>
            <button class="submit my-shadow" type="button" onclick="info()">info</button>
        </form>
    </div>
</body>

</html>