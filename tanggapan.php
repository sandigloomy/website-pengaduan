<?php

$judul = 'tanggapan🚀';
require 'core/db.php';
require 'masyarakat/templates/header.php';

$id = $_GET['id'];
if(empty($id)){
    header("location: /sandi/history");
}

$query = mysqli_query($conn, "SELECT * FROM pengaduan,tanggapan WHERE tanggapan.id_pengaduan= '$id'
AND tanggapan.id_pengaduan = pengaduan.id_pengaduan");

?>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl  align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link navbar-brand" aria-current="page" href="/sandi">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pengaduan">Pengaduan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="history">Pengaduan Anda</a></li>
                    <li><a class="dropdown-item" href="tanggapan">Tanggapan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)">Something else here</a></li>
                </ul>
            </li>
        </ul>
        <!-- User -->
    </div>

        <!-- /user -->
</nav>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Tanggapan
        </h4>
        <div class="card">
            <h5 class="card-header">Daftar Tanggapan Anda</h5>
            <div class="table-responsive text-nowrap">
                <!-- sear -->

                <!-- search -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><strong><?= $row['tanggapan'] ?></strong></td>
                                </tr>
                        <?php endwhile;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php

require 'masyarakat/templates/footer.php';
