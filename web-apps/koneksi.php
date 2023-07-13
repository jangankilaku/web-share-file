<?php
session_start();
$con = mysqli_connect('localhost','root','','web-apps');
$con2 = new PDO("mysql:dbname=web-apps;host=localhost",'root','');
if(!$con && !$con2){
    echo('koneksi gagal');
}
if(isset($_POST["upload"])){
    $id = rand(333,9999999999);
    $nama = $_POST['nama'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $des = $_POST['des'];
    if(!$nama){
        $galat = "Gagal Mengupload Pastikan Semua Colum di isi !!!";
        $_SESSION['galat'] =$galat;
        ?>
        <script>
            window.location.href="home.php";
        </script>
        <?php
    }else{
        $qwr = mysqli_query($con,"INSERT into apps (id,nama, link1, link2, des)values('$id','$nama','$link1','$link2','$des')");
        if($qwr){
            ?><script>
                window.location.href="index.php";
            </script>
            <?php
            $_SESSION['berhasil_i']="data berhasil di input";
        }
    }
}
if(isset($_POST["login"])){
    $user =$_POST['user'];
    $pas = md5($_POST['pas']);
    $sql =mysqli_query($con,"SELECT * from usser where user='$user'and pas='$pas'");
    $q = mysqli_fetch_array($sql);
    if($q>0){
        $_SESSION["stats"]= $q['akses'];
        ?>
        <script>window.location.href='index.php';</script>
        <?php
    }else{
        ?>
        <script>window.location.href='login.php';</script>
        <?php
    }
}
 if(isset($_POST['logout'])):
session_destroy();
header('location: index.php');
endif;