<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPS-File</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .home { display: none; }
        .login { display: inline; }
        button[name='logout']{ display: none;}
        
        <?php if(isset($_SESSION['stats'])): ?>
            <?php if ($_SESSION['stats']=='administrator' || $_SESSION['stats']=='admin'): ?>
                .home { display: inline; }
                .login {display: none;}
                button[name='logout']{ display: inline;}
                button[name='logout']:hover{background-color: #0980ff;}
            <?php elseif($_SESSION['stats']=='user'): ?>
                .logout { display: inline; }
            <?php endif; ?>
        <?php endif; ?>
        #lg{
  background-color: #0980ff; 
  border: none; 
  height: 33px;
  margin: 5px;
  width: 52px; 
  border-radius:3px; 
  color: white; 
  font-size: 100%;
}
#lg:hover{
    background-color: #0980ffd5; 
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <header>
                <nav>
                    <ul>
                        
                        <li><a href="home.php" class="home">Home</a></li>
                        <li><a href="list.php">List File</a></li>
                        <li><a href="login.php" class="login">Login</a></li>
                        <li>
                            <form action="" method="post">
                                <button id="lg" name="logout" class="material-symbols-outlined">logout</button>
                            </form>
                        </li>
                        <li><form method="GET" action="index.php">
                            <input type="text" name="keyword" placeholder="Search" class="search">
                            <button name="cari" class="material-symbols-outlined">Search</button>
                        </form></li>
                    </ul>
                </nav>
            </header>
            <div class="content">
                <?php
                if(isset($_GET['cari'])){
                    $keyword = $_GET['keyword'];
                    $query = "SELECT * FROM apps WHERE nama LIKE '%$keyword%'";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        echo '<div class="result">';
                        while ($row = $result->fetch_assoc()) {
                           ?> <div class="tampil">
                            <p class="nfile" style="text-transform: capitalize;"><?=$row["nama"]?></p>
                            <p class="deskripsi"><?= substr($row['des'],0,150)?>...</p><br>
                            <a href="file.php?id=<?=$row['id']?>">Download</a>
                        </div><?php
                        }
                    }else{
                        $error = "Keyword tidak ditemukan";
                        ?>
                        <div class="tampil">
                            <h3 style="text-align: center; text-transform: capitalize;"><?= $error ?></h3>
                        </div>
                        <?php
                    }
                }else{
                    $qwr=mysqli_query($con,"SELECT * FROM apps ORDER BY  apps . nama ASC");
                    while($q = mysqli_fetch_array($qwr)){
                    ?>
                    <div class="tampil">
                    <p class="nfile" style="text-transform: capitalize;"><?=$q["nama"]?></p>
                    <p class="deskripsi">Tanggal Upload : <?=$q['date']?></p>
                    <p class="deskripsi"><?= substr($q['des'],0,150)?>...</p><br>
                    <a href="file.php?id=<?=$q['id']?>">Download</a>
                    </div>
                    <?php }}
                    $con->close();?>
            </div>
        </div>
    </div>
</body>
</html>
