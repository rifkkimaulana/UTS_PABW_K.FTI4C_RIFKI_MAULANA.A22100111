<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$base_url_admin = "http://localhost/portal_berita/admin";
$db_Host = 'localhost';
$db_Name = 'portal_berita';
$db_Username = 'root';
$db_Password = '';

$mysqli = mysqli_connect($db_Host, $db_Username, $db_Password, $db_Name);
if (!$mysqli) {
    die("<script>alert(' Gagal tersambung dengan database.')</script>");
} 
?>