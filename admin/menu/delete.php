<?php
include_once("../../konfigurasi.php");
include('session.php');

$id = @$_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tb_menu WHERE id=$id");

header("Location:../dashboard.php?page=menu");
