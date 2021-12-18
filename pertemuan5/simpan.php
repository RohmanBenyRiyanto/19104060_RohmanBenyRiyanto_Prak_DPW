<?php
    include "koneksi.php";

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO data(nama, kelas, alamat) VALUES('$nama', '$kelas', '$alamat')";
    $add = $conn->query($sql);

    if($add) {
        $conn->close();
        header("location:index.php");
        exit();
    }else{
        $conn->close();
        header("Error : ".$conn->error);
        exit();
    }

?>