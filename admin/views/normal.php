<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-16 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang <?= ucwords($_SESSION['username_admin']) ?>! 🚀</h5>
                                <p class="mb-4">
                                    Anda masuk sebagai<span class="fw-bold"> <?= ucwords($_SESSION['username_admin']) ?></span> Dengan Kekuatan <span class="fw-bold"> <?php if ($_SESSION['level'] == "admin") : ?>OPEN POWER<?php endif ?> <?php if ($_SESSION['level'] == 'petugas') : ?>NPC<?php endif ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/Saly-43.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-black"> Aktifitas Hari Ini</h3>
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h6 class="fw-normal">Total <?= $berapaAKun ?> users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">

                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="../assets/svg/favicon.svg" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">masyarakat</h4>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                                <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <?php $listAdmin = query("SELECT * FROM petugas WHERE level = 'admin'"); $totalAdmin = count($listAdmin);?>
                                <h6 class="fw-normal">Total <?= $totalAdmin ?> users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Danny Paul" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="../assets/svg/admin.svg" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">Admin</h4>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                                <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                            <?php $listPetugas = query("SELECT * FROM petugas WHERE level = 'petugas'"); $totalPetugas = count($listPetugas);?>
                                <h6 class="fw-normal">Total <?= $totalPetugas ?> users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="../assets/svg/logo.svg" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">Petugas</h4>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                                <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/svg/favicon.svg" alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Akun</span>
                            <h3 class="card-title mb-2"><?= ucwords($akun['nama'])  ?></h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $berapaAKun ?>+</small>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-column">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/svg/sandi.svg" alt="Credit Card" class="rounded" />
                                    </div><br>
                                    <div class="d-flex justify-content-between w-100">
                                        <span class="fw-semibold d-block mb-1">Pengaduan Terakhir</span>
                                    </div>
                                    <h6 class="card-title mb-2"><?= ucwords($data['isi_laporan'])  ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Aktivitas</h5>
                                            <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
                                            <h3 class="mb-0">$84,686k</h3>
                                        </div>
                                    </div>
                                    <div id="profileReportChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">