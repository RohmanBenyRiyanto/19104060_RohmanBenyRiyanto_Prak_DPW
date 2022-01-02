<?php
    // menampilkan seluruh data
    include "koneksi.php";
    session_start();
    $kelas = ['SE-03-A', 'SE-03-B'];
    $sql = "SELECT * FROM data";
    $data = $conn->query($sql);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
        // preview image function
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <style>
        img {
            width: 150px
        }
    </style>

    <title>CRUD PHP</title>
</head>

<body>


    <div class="container">
        <h1 class="text-center mt-5 mb-5">Form Mahasiswa</h1>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h4>Input Data</h4>
                <!-- memanggil file read_message -->
                <?php include "read_message.php" ?>
                <!-- disimpan ke dalam file simpan.php -->
                <form action="simpan.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" class="form-control" required>
                            <option value="">Pilih</option>
                            <!-- menu drop down kelas -->
                            <?php foreach ($kelas as $kl) : ?>
                            <option value="<?= $kl; ?>"><?= $kl; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                    </div>
                    <!-- form input gambar -->
                    <div class="form-group">
                        <label for="foto">Masukkan Foto</label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"
                            accept="image/*" onchange="showPreview(event);" required>
                        <br><br>
                        <!-- preview image -->
                        <div class="preview">
                            <img id="file-ip-1-preview">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Data Mahasiswa</span>

                        </h4>
                    </div>
                    <div class="col-lg-6" style="text-align: right;">
                        <p>Jumlah Mahasiswa : <b>
                                <!-- menampilkan jumlah data yang ada di dalam tabel data -->
                                <?php
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowcount = mysqli_num_rows($result);
                                    echo $rowcount;
                                }
                                ?>

                            </b>
                        </p>
                    </div>
                </div>

                <!-- menampilkan data yang ada di dalam mysql -->
                <?php foreach ($data as $dt) : ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/uploads/<?php echo $dt['foto'] ?>" alt="" width="100%">
                            </div>
                            <div class="col-md-4">

                                <h4><?= $dt['nama']; ?></h4>
                                <p><?= $dt['alamat']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <!-- menambahkan tombol hapus -->
                                <a class="float-right ml-3 text-danger"
                                    href="hapus_data.php?mahasiswa_id=<?php echo $dt['id'] ?>" type="button"
                                    class="close">
                                    <span class="fa fa-trash"></span>
                                </a>

                                <!-- menambahkan tombol edit -->
                                <a class="float-right ml-3 text_success"
                                    href="update_form.php?mahasiswa_id=<?php echo $dt['id'] ?>" type="button"
                                    class="close">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <p class="text-right"><?= $dt['kelas']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>


</body>

</html>