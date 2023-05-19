<?php
include_once("konfigurasi.php");

$result = mysqli_query($mysqli, "SELECT * FROM tb_about");
$data = mysqli_fetch_assoc($result);
$about_content = $data['about_content'];
?>
<aside class="col-md-4 blog-sidebar">
  <div class="p-4 mb-3 bg-light rounded adjustable-div">
    <h4 class="font-italic">About</h4>
    <p class="mb-0"><?php echo "$about_content"; ?></p>
  </div>
</aside>