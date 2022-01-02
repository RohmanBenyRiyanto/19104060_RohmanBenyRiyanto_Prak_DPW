<?php
    include "koneksi.php";
    include "create_message.php";

    // menyimpan data ke dalam database
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    // File upload path
    $targetDir = "uploads/";
    $nama_file = time().$_FILES["file"]["name"];
    $file_temp = $_FILES["file"]["tmp_name"];

    // print_r($_FILES);
    if(isset($_POST['mahasiswa_id'])) {
        // kirim file
        move_uploaded_file($file_temp, $targetDir."/".$nama_file);
        $sql = "UPDATE data
                SET nama='$nama', kelas='$kelas', alamat='$alamat', foto='$nama_file'
                WHERE id=".$_POST['mahasiswa_id'];
        $edit = $conn->query($sql);

        if($edit) {
            $conn->close();
            // pesan ubah data berhasil
            create_message('Ubah data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $conn->close();
            // pesan error
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        // kirim file
        move_uploaded_file($file_temp, $targetDir."/".$nama_file);
        $sql = "INSERT into data(nama, kelas, alamat, foto)
                VALUES('$nama','$kelas','$alamat', '$nama_file')";
        $add = $conn->query($sql);
        if($add) {
            $conn->close();
            // pesan simpan data berhasil
            create_message('Simpan data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $conn->close();
            // pesan simpan data error
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
?>