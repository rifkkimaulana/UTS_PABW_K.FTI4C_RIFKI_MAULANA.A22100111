<?php
include_once("../../konfigurasi.php");
include('session.php');

$id = @$_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tb_kategori_berita WHERE id=$id");


header("Location:../dashboard.php?page=kategori_berita");
?>