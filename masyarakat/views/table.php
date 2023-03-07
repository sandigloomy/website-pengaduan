<?php

session_start();

// Memeriksa apakah pengguna sudah login dengan memeriksa apakah ada informasi NIK pengguna di session
if (!isset($_SESSION['nik'])) {
    // Jika tidak ada informasi NIK pengguna di session, redirect ke halaman login
    header('Location: /sandi/login');
    exit();
}

require 'core/db.php';

$nik = $_SESSION['nik'];

$judul = "daftar";

$sql = "SELECT pengaduan.id_pengaduan, pengaduan.tgl_pengaduan, pengaduan.isi_laporan, pengaduan.foto, pengaduan.status, masyarakat.nik, masyarakat.nama,masyarakat.username, masyarakat.telp
        FROM pengaduan
        INNER JOIN masyarakat
        ON pengaduan.nik = masyarakat.nik
        WHERE pengaduan.nik = '$nik'";

$result = mysqli_query($conn, $sql);

require 'masyarakat/templates/header.php';

?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl  align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link navbar-brand" aria-current="page" href="/sandi">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sandi/daftar">Pengaduan Anda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="javascript:void(0)">Pengaduan</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)">Tanggapan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)">Something else here</a></li>
                </ul>
            </li>
        </ul>
        <!-- User -->
    </div>

    <?php require 'masyarakat/pengaduan/profile.nav.php' ?>
        <!-- /user -->
</nav>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Pengaduan
        </h4>
        <div class="card">
            <h5 class="card-header">Daftar Pengaduan Anda</h5>
            <div class="table-responsive text-nowrap">
                <!-- sear -->

                <!-- search -->
                <table class="table">
                    <caption class="ms-4">
                        List of Accounts
                    </caption>
                    <thead>
                        <tr>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Tanggal</th>
                            <th>Bukti</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) : ?>

                                <tr>
                                    <!-- <td></td>s -->
                                    <td><i class="fab fa-angular fa-lg text-danger"></i>
                                        <strong><?= $row['nik']; ?></strong>
                                    </td>
                                    <td><strong><?= $row['nama'] ?></strong></td>
                                    <td><strong><?= $row['username'] ?></strong></td>
                                    <td><strong><?= $row['tgl_pengaduan']; ?></strong></td>
                                    <td class="me-3">
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#foto<?= $row['id_pengaduan'] ?>" title="gambar">
                                                <img src="uploads/images/<?= $row['foto'] ?>" width="80" />
                                                <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $row['id_pengaduan'] ?>">Lihat
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge <?php if ($row['status'] == "proses") {
                                                                echo "bg-warning";
                                                            } else if ($row['status'] == "selesai") {
                                                                echo "bg-success";
                                                            } else if ($row['status'] == "tolak") {
                                                                echo "bg-danger";
                                                            } ?>"><?= $row['status']; ?></span></td>
                                        <?php require 'modal.bukti.php.php';  ?>
                                        </form>
                                        <!-- akhir Modal Verifikasi & Laporan -->
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
