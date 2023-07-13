<?php
include 'koneksi.php';
if(isset($_SESSION['stats'])=="" || $_SESSION['stats']=="user"){
    header('location: 404.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPS-Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container">
        <div class="header">
        <header>
            <nav>
                <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="list.php">List File</a></li>
                </ul>
            </nav>
        </header>
        </div>
        <div class="conten">
            <div class="uploud">
            <?php if(isset($_SESSION['galat'])){
                        ?><p style="color:red;"><?= $_SESSION['galat'] ?></p>
                        <?php
                        unset($_SESSION['galat']);
                    } ?>
                <form action="koneksi.php" method="post">
                    <label for="nama">Nama file</label>
                    <input type="text" name="nama" id="nama" placeholder="Nama"><br>
                    <label for="link1">Link 1</label>
                    <input type="text" name="link1" id="link1" placeholder="https://"><br>
                    <label for="link2">Link 2</label>
                    <input type="text" name="link2" id="link2" placeholder="https://"><br>
                    <label for="des">Deskripsi file</label>
                    <textarea name="des" id="des"></textarea><br>
                    <button name="upload">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>