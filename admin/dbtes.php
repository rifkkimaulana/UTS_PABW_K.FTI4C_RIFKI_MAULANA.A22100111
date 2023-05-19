<?php
// Menghubungkan ke database
$host = 'localhost'; // Ganti dengan host Anda
$username = 'root'; // Ganti dengan username MySQL Anda
$password = ''; // Ganti dengan password MySQL Anda
$database = 'portal_berita'; // Ganti dengan nama database Anda

$mysqli = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($mysqli->connect_errno) {
    echo "Gagal terhubung ke MySQL: " . $mysqli->connect_error;
    exit();
}

// Memeriksa apakah form telah dikirim
if (isset($_POST['update'])) {
    // Mendapatkan data dari form
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    // Mengupdate data di tabel
    $query = "UPDATE tb_kategori SET nama_kategori='$nama_kategori' WHERE id=$id";

    if ($mysqli->query($query) === TRUE) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    // Menutup koneksi database
    $mysqli->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PANEL ADMIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('halaman/navbar.php'); ?>
        <?php include_once('halaman/sidebar.php'); ?>

        <div class="content-wrapper">

            <?php include_once('kategori/content-header.php'); ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data kategori</h3>

                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=kategori" class="btn btn-info">Kembali</a>
                                    </div>

                                </div>

                                <div class="card-body">

                                    <form method="post">
                                        <input type="" name="id" value="<?= $id ?>">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input name="nama_kategori" type="text" class="form-control" >
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="update">Ubah</button>

                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('halaman/footer.php'); ?>

    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
        function confirmDelete() {
            if (confirm('Anda yakin menghapus data?')) {
                //action confirmed
                alert('Data berhasil dihapus');
            } else {
                //action cancelled
                alert('Data batal di hapus');
                return false;

            }
        }
    </script>

</body>
</html>