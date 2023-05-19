<div class="container">
    <?php include('pages/header.php'); ?>
    <?php include('pages/navbar.php'); ?>

    <div class="container py-5">
      <div class="jumbotron text-white jumbotron-image shadow" style="background-image: url(https://rifkkimaulana.com/uploads/img/banner-web-design.png);">
        <h2 class="mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
        Join For The Best Experience
        </h2>
        <p class="mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
          Hey, check this out.
        </p>
        <a href="/portal_berita/index.php" class="btn btn-primary" >Lihat Halaman Berita</a>
      </div>
    </div>


    <div class="row mb-2">
      <?php
      while ($data = mysqli_fetch_array($artikel)) {
      ?>
        <div class="col-md-6">
          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary"><?= $data['nama_kategori'] ?></strong>
              <h3 class="mb-0">New post</h3>
              <div class="mb-1 text-muted"><?= date('d-M-Y', strtotime($data['created_time'])) ?></div>
              <p class="card-text mb-auto text-justify"><?= substr($data['content_artikel'], 0, 100) . '...' ?></p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img width="200px" class="rounded float-right" src="../admin/artikel/image/<?= $data['cover'] ?>" alt="">
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <main role="main" class="container">

    <div class="row">

      <div class="col-md-8 blog-main">
        <?php
        while ($dataArtikel = mysqli_fetch_array($new_artikel)) {
        ?>
          <h3 class="pb-4 mb-4 font-italic border-bottom">
            New Update Post
          </h3>

          <div class="blog-post">
            <h2 class="blog-post-title">
              <?= $dataArtikel['judul_artikel'] ?>

            </h2>
            <p class="blog-post-meta"><?= date('d-M-Y', strtotime($dataArtikel['created_time'])) ?> by <a href="#"><?= $dataArtikel['nama_operator'] ?></a></p>
            <p class="text-justify"><?= $dataArtikel['content_artikel'] ?></p>
          </div>
        <?php } ?>
        <nav class="blog-pagination">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" <?php if ($halaman > 1) {
                                      echo "href='?halaman=$previous'";
                                    } ?>>Sebelumnya</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
              <li class="page-item"><a class="page-link" href="?halaman=<?= $x ?>"><?= $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link" <?php if ($halaman < $total_halaman) {
                                      echo "href='?halaman=$next'";
                                    } ?>>Selanjutnya</a>
            </li>
          </ul>
        </nav>

      </div>
      <?php include('pages/sidebar.php'); ?>

  </main>