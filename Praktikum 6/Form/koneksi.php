<?php
    // koneksi ke dalam mysql
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "db_php_crud";

    $conn = new mysqli($host,$user,$pass,$dbname);

    if($conn-> connect_error){
        die('Koneksi Gagal : '. $conn->connect_error);
    }

?>