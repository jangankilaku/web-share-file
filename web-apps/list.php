<?php
include 'koneksi.php';
if(!isset($_SESSION['stats'])){
    ?>
    <style>.logout{display: none;}</style>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/list.css">
</head>
<body>
    <div class="content">
        <div class="header">
            <ul>
                <li class="home"><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li class="logout">
                <form action="" method="post">
                <button name="logout" class="material-symbols-outlined" style="background-color: #0980ff; border: none; height: 33px; width: 52px; border-radius:3px; color: white; font-size: 100%;">Person</button>
                </form>
                </li>
            </ul>
        </div>
        <div class="content">
            <h4>List File</h4>
                <?php
                $sql = mysqli_query($con,"SELECT * FROM apps ORDER BY apps . nama ASC");
                while ($q = mysqli_fetch_array($sql)) {
                    ?>
                    <ul class="form">
                        <li class="nfile"><a href="file.php?id=<?=$q['id']?>"><?= $q['nama'] ?></a></li>
                    </ul>
                    <?php
                    }
                ?>
        </div>
    </div>
</body>
</html>