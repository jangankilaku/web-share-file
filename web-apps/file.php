<?php
include 'koneksi.php';
$id =$_GET['id'];
if(!$id){
    header('location: 404.php');
}else{
$sql = mysqli_query($con,"SELECT * from apps where id=$id");
$row=mysqli_fetch_array($sql);}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/file.css">
    <title>Webs-apps | Download</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <ul>
                <li><h3>Download</h3></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="list.php">List File</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="header-jd" align="center">
                <h1><?=$row['nama']?></h1>
                <div class="fake-img">
                    <br>
                    <h3 class="img"><?=$row['nama']?></h3>
                </div>
            </div>
            <div class="deskripsi">
            <?= $row['des']?>
            </div>
            <div class="download">
                <table align="center">
                    <tr>
                        <th>Link 1</th><th>link 2</th>
                    </tr>
                    <tr>
                        <td><a href="<?=$row['link1']?>">Downloads</a></td>
                        <td><a href="<?=$row['link2']?>">Downloads</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</html>