<?php

// ? start the session
session_start();

// ? gunakan array untuk menyimpan informasi sesi
$session_storage = array();

// ! periksa apakah pengguna sudah masuk
if (!isset($_SESSION['username'])) {
    // ! redirect ke halaman login jika pengguna tidak login
    header("Location:  /sandi/login");
}

// ? simpan data sesi dalam larik $session_storage
$session_storage['username'] = $_SESSION['username'];

// ! tulis semua data sesi ke file
// ? mengurangi beban server xixi
file_put_contents('session.data', serialize($session_storage));


require 'core/db.php';

$judul = "Home🚀";

require 'templates/header.php';


?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl  align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link navbar-brand" aria-current="page" href="/sandi">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="daftar">Pengaduan Anda</a>
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
        <?php require 'pengaduan/profile.nav.php' ?>
        <!-- /user -->
    </div>
</nav>

<!-- Modal User -->
<?php require 'pengaduan/profile.php'; ?>
<!--/ Modal User -->


<!-- Content -->
<div class="layout-wrapper layout-content-navbar">
    <div class="content-wrapper">
        <div class="">
            <section class="bg-white dark:bg-gray-900">
                <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
                    <div class="mr-auto  lg:col-span-7">
                        <h1 color="black" class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                            Hey, welcome Sandi from planet Earth🌍.</h1>
                        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                            The world is a <span class="badge bg-label-warning">“dangerous place”</span>
                            ,Elliot,not because they are the ones who commit crimes, but because they just watch and
                            do nothing.
                        </p>
                        <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                            <a href="pengaduan" class="btn text-primary" id="pengaduan">
                                <i class="bx bx-coffee me-2"></i>
                                <span class="align-middle">Pengaduan</span>

                            </a>
                            <div class="app-brand justify-content-center">
                                <span>
                                    <div id="svg"></div>
                                </span>

                                <h5 class="mb-1" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-code-alt bx-xs' ></i> <span>leave me, i'm at bad treating people</span>">
                                    sandimlnfzn_</h5>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                        <div id="carouselExample" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="assets/img/illustrations/sandii.png" alt="First slide" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <!-- <h3>First slide</h3>
                                <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p> -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/img/illustrations/Saly-41.png" alt="Second slide" />
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/img/illustrations/Saly-43.png" alt="Third slide" />
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
</div>
<!-- Footer -->
<?php

require 'templates/footer.php';
