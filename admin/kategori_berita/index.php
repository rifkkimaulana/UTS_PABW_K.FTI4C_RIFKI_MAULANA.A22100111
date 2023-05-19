<?php
include_once("../konfigurasi.php");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kategori Berita</h3>
                        <div class="card-tools">
                            <a href='kategori_berita/create.php?page=kategori_berita' class="btn btn-info"><i class="fas fa-plus"></i>Tambah kategori</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_kategori_berita ORDER BY id DESC");

                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_kategori'] ?></td>
                                    <td>
                                        <a class="btn btn-success" href='kategori_berita/edit.php?id=<?= $data['id'] ?>&page=kategori_berita'>Edit</a>
                                        <a class="btn btn-danger" onclick='return confirmDelete()' href='kategori_berita/delete.php?id=<?= $data['id'] ?>&page=kategori_berita'>Hapus</a>
                                    </td>
                                </tr><?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
