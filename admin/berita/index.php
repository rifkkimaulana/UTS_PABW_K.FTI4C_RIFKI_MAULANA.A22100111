<?php
include_once("../konfigurasi.php");
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data berita</h3>
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='berita/create.php?page=berita' class="btn btn-info"><i class="fas fa-plus"></i>Tambah berita</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Kategori Berita</th>
                                <th>Penulis</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $result = mysqli_query($mysqli, "SELECT tb_berita.*,
                            tb_kategori_berita.nama_kategori,
                            tb_users.nama_operator
                            FROM tb_berita
                            INNER JOIN tb_kategori_berita ON tb_berita.id_kategori = tb_kategori_berita.id
                            INNER JOIN tb_users ON tb_berita.user_id = tb_users.id
                            ORDER BY id DESC");

                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['judul_berita'] ?></td>
                                    <td><?= $data['nama_kategori'] ?></td>
                                    <td><?= $data['nama_operator'] ?></td>
                                    <td>
                                        <a class="btn btn-success" href='berita/edit.php?id=<?= $data['id'] ?>&page=berita'>Edit</a>
                                        <a class="btn btn-danger" onclick='return confirmDelete()' href='berita/delete.php?id=<?= $data['id'] ?>&page=berita'>Hapus</a>
                                    </td>
                                </tr><?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
