<?php
include_once("../../konfigurasi.php");
include('session.php');

$id = @$_GET['id'];

$sql = "SELECT cover FROM tb_berita WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);
$data = mysqli_fetch_assoc($result);
$imageName = $data['cover'];

$result = mysqli_query($mysqli, "DELETE FROM tb_berita WHERE id=$id");

if ($result && !empty($imageName)) {
    $uploadDir = 'image/';
    $imagePath = $uploadDir . $imageName;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

header("Location:../dashboard.php?page=berita");
?>
