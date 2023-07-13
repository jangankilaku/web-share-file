<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPS-Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<style>
      
    </style>
<body>
    <div class="container">
        <div class="login">
            <h3>Login</h3>
            <form action="koneksi.php" method="post">
                <label for="user">username</label>
                <input type="text" name="user" id="user">
                <label for="pas">password</label>
                <input type="password" name="pas" id="pas">
                <button name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>