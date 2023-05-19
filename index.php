<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("konfigurasi.php");

$no = 1;
$allBerita = mysqli_query($mysqli, "SELECT tb_berita.*,
                            tb_kategori_berita.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_berita
                            INNER JOIN tb_kategori_berita ON tb_berita.id_kategori = tb_kategori_berita.id
                            INNER JOIN tb_users ON tb_berita.user_id = tb_users.id
                            ORDER BY id DESC
                            ");
$batas = 2;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;
$jumlah_data = $allBerita->num_rows;
$total_halaman = ceil($jumlah_data / $batas);

$new_berita = mysqli_query($mysqli, "SELECT tb_berita.*,
                            tb_kategori_berita.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_berita
                            INNER JOIN tb_kategori_berita ON tb_berita.id_kategori = tb_kategori_berita.id
                            INNER JOIN tb_users ON tb_berita.user_id = tb_users.id
                            LIMIT $halaman_awal, $batas
                           ");
$berita = mysqli_query($mysqli, "SELECT tb_berita.*,
                            tb_kategori_berita.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_berita
                            INNER JOIN tb_kategori_berita ON tb_berita.id_kategori = tb_kategori_berita.id
                            INNER JOIN tb_users ON tb_berita.user_id = tb_users.id
                            ORDER BY id DESC
                            LIMIT 4
                            ");

$kategori = mysqli_query($mysqli, "SELECT * from tb_kategori_berita");
$menu = mysqli_query($mysqli, "SELECT * from tb_menu");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PORTAL BERITA</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="img.css" rel="stylesheet">
  <link href="blog.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
</head>

<body>
  <div class="container">
  <?php include('pages/header.php'); ?>
  <?php include('pages/navbar.php'); ?>

  <div class="container py-5">
    <div class="jumbotron text-white jumbotron-image shadow" style="background-image: url(https://rifkkimaulana.com/uploads/img/banner-web-design.png);">
      <h2 class="mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
        Join For The Best Experience
      </h2>
      <p class="mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
        Hey, check this out.
      </p>
      <a href="/portal_berita/artikel/index.php" class="btn btn-primary">Lihat Halaman Artikel</a>
    </div>
  </div>

  <?php include('pages/main_content.php'); ?>
  <?php include('pages/footer.php'); ?>
</body>
</html>