<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Daftar Akun Masyarakat</h5>
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
                        <?php $no = 1; ?>
                        <?php foreach ($masyarakat as $row) : ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><i class="fab fa-angular fa-lg text-danger"></i> <strong><?= $row['nama']; ?></strong></td>
                                <td><?= $row['username']; ?></td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="../assets/img/avatars/sandi.svg" alt="Avatar" class="rounded-circle" />
                                        </li>

                                    </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>

                                    <a class="dropdown-item" href="hapus.php?table=masyarakat&id=<?= $row['nik']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>