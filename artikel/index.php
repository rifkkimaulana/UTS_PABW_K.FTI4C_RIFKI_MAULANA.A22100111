<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../konfigurasi.php");

$no = 1;
$allArtikel = mysqli_query($mysqli, "SELECT tb_artikel.*,
                            tb_kategori.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_artikel
                            INNER JOIN tb_kategori ON tb_artikel.id_kategori = tb_kategori.id
                            INNER JOIN tb_users ON tb_artikel.user_id = tb_users.id
                            ORDER BY id DESC
                            ");
$batas = 2;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;
$jumlah_data = $allArtikel->num_rows;
$total_halaman = ceil($jumlah_data / $batas);

$new_artikel = mysqli_query($mysqli, "SELECT tb_artikel.*,
                            tb_kategori.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_artikel
                            INNER JOIN tb_kategori ON tb_artikel.id_kategori = tb_kategori.id
                            INNER JOIN tb_users ON tb_artikel.user_id = tb_users.id
                            LIMIT $halaman_awal, $batas
                           ");
$artikel = mysqli_query($mysqli, "SELECT tb_artikel.*,
                            tb_kategori.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_artikel
                            INNER JOIN tb_kategori ON tb_artikel.id_kategori = tb_kategori.id
                            INNER JOIN tb_users ON tb_artikel.user_id = tb_users.id
                            ORDER BY id DESC
                            limit 4
                            ");


$kategori = mysqli_query($mysqli, "SELECT * from tb_kategori");
$menu = mysqli_query($mysqli, "SELECT * from tb_menu");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PORTAL BERITA & ARTIKEL</title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../img.css" rel="stylesheet">
  <link href="../blog.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
</head>

<body>
  <?php include('pages/main_content.php'); ?>
  <?php include('../pages/footer.php'); ?>
</body>
</html>