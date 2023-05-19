<?php
include_once("../../konfigurasi.php");
include('session.php');
$id = @$_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM tb_about WHERE id=$id");
while ($data = mysqli_fetch_array($result)) { 
    $row_about = $data['about_content'];
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $about_content = @$_POST['about_content'];
    $result = mysqli_query($mysqli, "UPDATE tb_about SET about_content='$about_content' WHERE id=$id");
    header("Location:../dashboard.php?page=about_content");
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
        <?php include_once('../halaman/navbar.php'); ?>
        <?php include_once('../halaman/sidebar.php'); ?>
        <div class="content-wrapper">
            <?php include_once('content-header.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">About</h3>
                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=about_content" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="form-group">
                                            <label for="about_content">About</label>
                                            <textarea class="form-control" name="about_content" required autofocus><?= $row_about ?></textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once('../halaman/footer.php'); ?>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>
</html>