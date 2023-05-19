<?php
include_once("../konfigurasi.php");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">About</h3>
                        
                    </div>
                    <div class="card-body">
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>About</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_about ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['about_content'] ?></td>
                                    <td>
                                        <a class="btn btn-success" href='about_content/edit.php?id=<?= $data['id'] ?>&page=about_content'>Edit</a>
                                    </td>
                                </tr><?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>