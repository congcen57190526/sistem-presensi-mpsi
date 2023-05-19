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
    function sub() {
        window.location.href = "pages/dashboard.php";
    }
</script>

<body>
    <div class="bg">
        <form align="center" class="form">
            <h1 style="color: #936D49">Login</h1><br>
            <input class="login my-shadow" type="text" placeholder="Kode Guru"><br><br>
            <input class="login my-shadow" type="password" placeholder="Password"><br><br>
            <button class="submit my-shadow" type="button" onclick="sub()">Submit</button>
        </form>
    </div>
</body>
</html>