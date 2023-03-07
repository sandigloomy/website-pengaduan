<?php

if (isset($_POST['tambahPetugas'])) {
    // var_dump($_POST);
    if (tambahPetugas($_POST) > 0) {
        echo "<div class='alert alert-primary alert-dismissible' role='alert'>
                    Berhasil
                    <button type='button' class='btn-close' data-bs-dismiss='alert' ariana-label='Close'></button>
                        </div>";
    } else {
        echo mysqli_error($conn);
    }
}


?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Akun Petugas </h4>
        <div class="card">
            <h5 class="card-header">Daftar Akun Petugas</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <caption class="ms-4">
                        List of Accounts
                    </caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;  ?>
                        <?php foreach ($Petugas as $row) : ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><i class="fab fa-angular fa-lg text-danger"></i> <strong><?= $row['nama_petugas']; ?></strong></td>
                                <td><?= $row['username']; ?></td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Gambar">
                                            <img src="../assets/img/avatars/sandi.svg" alt="Avatar" class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge <?php if ($row['level'] == 'petugas') {
                                                                echo 'bg-info';
                                                        } else if ($row['level'] == 'admin') {
                                                            echo 'bg-primary';
                                                        }
                                                        ?> me-1"><?= $row['level']; ?></span></td>
                                <td>
                                    <a class="" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-light" href="hapus.php?table=petugas&key=id_petugas&id=<?= $row['id_petugas']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn text-primary" data-bs-toggle="modal" data-bs-target="#tambahPetugas<?= $row['id_petugas'] ?>">Tambah Petugas</button>
            </div>
            <?php require 'modal/modal.tambah.petugas.php';  ?>
        </div>