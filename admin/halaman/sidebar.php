<?php
$base_url = "http://localhost/portal_berita/admin";
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light"><b>ADMIN DASHBOARD</b></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'GUEST'; ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=dashboard" class="nav-link <?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=users" class="nav-link <?php echo ($page == 'users') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=menu" class="nav-link <?php echo ($page == 'menu') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=kategori" class="nav-link <?php echo ($page == 'kategori') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Kategori Artikel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=kategori_berita" class="nav-link <?php echo ($page == 'kategori_berita') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Kategori Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=artikel" class="nav-link <?php echo ($page == 'artikel') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=berita" class="nav-link <?php echo ($page == 'berita') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/dashboard.php?page=about_content" class="nav-link <?php echo ($page == 'about_content') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            About Setting
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>