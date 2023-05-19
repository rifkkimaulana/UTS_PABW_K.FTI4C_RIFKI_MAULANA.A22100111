<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../../konfigurasi.php");
include('session.php');

if (isset($_POST['ubah'])) {
    $judul_artikel = @$_POST['judul_artikel']; //JUDUL ARTIKEL
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul_artikel"])));
    $created_time = date("Y-m-d H:i:s"); //BUAT WAKTU OTOMATIS
    $user_id = $_SESSION['id']; //ID USER UNTUK SESSION
    $kategori = @$_POST['kategori']; //VARIABEL KATEGORI
    $content_artikel  = @$_POST['content_artikel'];
    $artikel_id = $_POST['artikel_id']; //ID ARTIKEL

    // Memeriksa apakah ada file yang diunggah
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
        $file = $_FILES['gambar'];

        // Memeriksa tipe file
        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }

        // Mengambil informasi file yang diunggah
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Menggunakan direktori tujuan penyimpanan file
        $uploadDir = 'image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Memindahkan file ke direktori tujuan
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';
        $upload = ($uniqueFileName . $fileName);
        $uploaddb = ($uniqueFileName . $fileName);
        if(move_uploaded_file($fileTmpName, $uploadDir . $upload)){
            // Melakukan query UPDATE setelah file berhasil diunggah
            // Menghapus gambar lama jika ada
            $query_artikel = mysqli_query($mysqli, "SELECT * FROM tb_artikel WHERE id='$artikel_id'");
            $data = mysqli_fetch_array($query_artikel);
            $row_cover_artikel = $data['cover'];

            if (!empty($fileName) && $fileName !== $row_cover_artikel) {
                $oldImagePath = $uploadDir . $row_cover_artikel;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

        
            $result = mysqli_query($mysqli, "UPDATE tb_artikel SET judul_artikel='$judul_artikel', created_time='$created_time', user_id='$user_id', id_kategori='$kategori', content_artikel='$content_artikel', cover='$uploaddb' WHERE id='$artikel_id'");
            
            if ($result) {
                // Berhasil mengubah data dan gambar
                echo "<script>window.location.href = '../../admin/dashboard.php?page=artikel';</script>";
                exit;
            } else {
                // Gagal mengubah data dan gambar
                echo "<script>alert('Gagal mengubah artikel!');</script>";
                exit;
            }
        } else {
            // Gagal memindahkan file ke direktori tujuan
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        // Tidak ada file yang diunggah, hanya mengubah data artikel
        $result = mysqli_query($mysqli, "UPDATE tb_artikel SET judul_artikel='$judul_artikel', created_time='$created_time', user_id='$user_id', id_kategori='$kategori', content_artikel='$content_artikel' WHERE id='$artikel_id'");
        
        if ($result) {
            // Berhasil mengubah data artikel
            echo "<script>alert('Artikel berhasil diubah!');</script>";
            echo "<script>window.location.href = '../../admin/dashboard.php?page=artikel';</script>";
            exit;
        } else {
            // Gagal mengubah data artikel
            echo "<script>alert('Gagal mengubah artikel!');</script>";
            exit;
        }
    }
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
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include('../halaman/navbar.php'); ?>
        <?php include('../halaman/sidebar.php'); ?>
        
        <div class="content-wrapper">

            <?php include('content-header.php'); ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Artikel
                                    </h3>

                                    <div class="card-tools">

                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=artikel" class="btn btn-info">Kembali</a>
                                    </div>

                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <?php
                                        $artikel_id = $_GET['id'];
                                        $artikel = mysqli_query($mysqli, "SELECT * FROM tb_artikel WHERE id='$artikel_id'");
                                        $data = mysqli_fetch_array($artikel);
                                        ?>

                                        <input type="hidden" name="artikel_id" value="<?= $data['id'] ?>">

                                        <div class="form-group">
                                            <label for="judul_artikel">Judul artikel</label>
                                            <input type="text" class="form-control" name="judul_artikel" required autofocus value="<?= $data['judul_artikel'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="content_artikel">Content</label>
                                            <textarea type="text" class="form-control" name="content_artikel" required><?= $data['content_artikel'] ?></textarea>
                                        </div>

                                        <?php
                                        $kategori = mysqli_query($mysqli, "SELECT * FROM tb_kategori ORDER BY id DESC");
                                        ?>

                                        <div class="form-group">
                                            <label for="content_artikel">Kategori</label>
                                            <select class="form-control" name="kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php while ($row = mysqli_fetch_array($kategori)) { ?>
                                                    <option value="<?= $row['id'] ?>" <?= ($row['id'] == $data['id_kategori']) ? 'selected' : '' ?>><?= $row['nama_kategori'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control" name="gambar">
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit" name="ubah">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../halaman/footer.php'); ?>

    </div>
</body>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
