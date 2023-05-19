<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include "../../konfigurasi.php";
include 'session.php';

if (isset($_POST['ubah'])) {
    $judul_berita = $_POST['judul_berita'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul_berita"])));
    $created_time = date("Y-m-d H:i:s");
    $user_id = $_SESSION['id'];
    $kategori = $_POST['kategori'];
    $content_berita = $_POST['content_berita'];
    $berita_id = $_POST['berita_id'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['gambar'];

        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        $uploadDir = 'image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';
        $upload = $uniqueFileName . $fileName;
        $uploaddb = $uniqueFileName . $fileName;
        if (move_uploaded_file($fileTmpName, $uploadDir . $upload)) {
            $query_berita = mysqli_query($mysqli, "SELECT * FROM tb_berita WHERE id='$berita_id'");
            $data = mysqli_fetch_array($query_berita);
            $row_cover_berita = $data['cover'];

            if (!empty($fileName) && $fileName !== $row_cover_berita) {
                $oldImagePath = $uploadDir . $row_cover_berita;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($mysqli, "UPDATE tb_berita SET judul_berita='$judul_berita', created_time='$created_time', user_id='$user_id', id_kategori='$kategori', content_berita='$content_berita', cover='$uploaddb' WHERE id='$berita_id'");

            if ($result) {
                // Berhasil mengubah data dan gambar
                echo "<script>window.location.href = '../../admin/dashboard.php?page=berita';</script>";
                exit;
            } else {
                // Gagal mengubah data dan gambar
                echo "<script>alert('Gagal mengubah berita!');</script>";
                exit;
            }
        } else {
            // Gagal memindahkan file ke direktori tujuan
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        // Tidak ada file yang diunggah, hanya mengubah data artikel
        $result = mysqli_query($mysqli, "UPDATE tb_berita SET judul_berita='$judul_berita', created_time='$created_time', user_id='$user_id', id_kategori='$kategori', content_berita='$content_berita' WHERE id='$berita_id'");

        if ($result) {
            // Berhasil mengubah data artikel
            echo "<script>window.location.href = '../../admin/dashboard.php?page=berita';</script>";
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

        <?php include '../halaman/navbar.php'; ?>
        <?php include '../halaman/sidebar.php'; ?>

        <div class="content-wrapper">

            <?php include 'content-header.php'; ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Berita
                                    </h3>

                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=berita_content" class="btn btn-info">Kembali</a>
                                    </div>

                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <?php
                                        $berita_id = $_GET['id'];
                                        $berita = mysqli_query($mysqli, "SELECT * FROM tb_berita WHERE id='$berita_id'");
                                        $data = mysqli_fetch_array($berita);
                                        ?>

                                        <input type="hidden" name="berita_id" value="<?= $data['id'] ?>">

                                        <div class="form-group">
                                            <label for="judul_berita">Judul Berita</label>
                                            <input type="text" class="form-control" name="judul_berita" required autofocus value="<?= $data['judul_berita'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="content_berita">Content</label>
                                            <textarea type="text" class="form-control" name="content_berita" required><?= $data['content_berita'] ?></textarea>
                                        </div>

                                        <?php
                                        $kategori_berita = mysqli_query($mysqli, "SELECT * FROM tb_kategori_berita ORDER BY id DESC");
                                        ?>

                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select class="form-control" name="kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php while ($row = mysqli_fetch_array($kategori_berita)) { ?>
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

        <?php include '../halaman/footer.php'; ?>

    </div>
</body>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</html>
