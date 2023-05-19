<?php
include_once("../konfigurasi.php"); //include file konfigurasi.php

$user_check = $_SESSION['username']; //variabel dan cek apakah pengguna sudah login atau tidak
$sql = "SELECT username FROM tb_users WHERE username='$user_check'"; //mencari pengguna pada tabel dalam database
$result = mysqli_query($mysqli, $sql); //hasil query akan disimpan di variabel result
if ($result->num_rows ==  0) { //kondisi dimana query mengembalikan baris pengguna yang sesuai
    $row = mysqli_fetch_assoc($result); //Jika pengguna tidak ditemukan, maka baris ini akan mencoba mengambil baris hasil query menggunakan fungsi mysqli_fetch_assoc() dan menyimpannya dalam variabel $row
    $login_session = $row['username']; //Nilai dari kolom 'username' dari baris yang diambil disimpan dalam variabel $login_session.
    if (!isset($login_session)) { //Ini adalah kondisi yang memeriksa apakah variabel $login_session tidak diatur. Jika tidak diatur, ini menunjukkan bahwa pengguna tidak valid dan mungkin belum login.
        header('Location: logout.php'); //Jika pengguna tidak valid atau tidak login, pengguna akan diarahkan ke halaman logout.php
    }
    exit();
}
?>