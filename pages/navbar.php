<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <?php
        while ($data_menu = mysqli_fetch_array($menu)) {
        ?>
        <a class="p-2 text-muted" href="#"><?= $data_menu['nama_menu'] ?></a>
        <?php } ?>
    </nav>
</div>