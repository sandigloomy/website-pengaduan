<?php

function tablePengaduan()
{
    global $conn;
    $pengaduan = mysqli_query($conn, "SELECT * FROM pengaduan");

?>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <?php

            if (isset($_POST['verifikasiLaporan'])) {
                if (verifikasiLaporan($_POST) > 0) {
                    echo "<div class='alert alert-secondary alert-dismissible' role='alert'>
                    Sedang Verfikasi..wait..
                    <button type='button' class='btn-close' data-bs-dismiss='alert' ariana-label='Close'></button>
                        </div>
                    <script>
                        setInterval( () => {
                    window.location.href = '?us=pengaduan';
                    }, 2000);
                    </script>";
                }
            }

            ?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Pengaduan
        </h4>
            <div class="card">
                <!-- <h5 class="card-header">Daftar Pengaduan</h5> -->
                <div class="table-responsive text-nowrap">
                    <!-- sear -->
                    <div class="navbar-nav">
                        <?php if(isset($_POST['cari'])) {
                                $pengaduan = cariPengaduan($_POST['keyword']); 
                                } ?>
                        <div class="nav-item d-flex align-items-center card-header">
                        <i class="bx bx-search fs-4 lh-0"></i>
                            <form action="" method="post">
                                <input type="text" name="keyword" class="form-control border-0 shadow-none" placeholder="Cariii..." aria-label="Search..." id="keyword" autocomplete="off" />
                                <button type="submit" name="cari" hidden>search</button>
                            </form>
                        </div>
                    </div>
                    <!-- search -->
                    <table class="table">
                        <caption class="ms-4">
                            List of Accounts
                        </caption>
                        <thead>
                            <tr>
                                <th>Nik</th>
                                <th>Tanggal</th>
                                <th>Bukti</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Verifikasi & Laporan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengaduan as $row) : ?>

                                <tr>
                                    <!-- <td></td>s -->
                                    <td><i class="fab fa-angular fa-lg text-danger"></i> <strong><?= $row['nik'];
                                                                                                    ?></td>
                                    <td><?= $row['tgl_pengaduan']; ?></td>
                                    <td class="me-3">
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" data-bs-toggle="modal" data-bs-target="#foto<?= $row['id_pengaduan'] ?>" title="gambar">
                                                <img src="../uploads/images/<?= $row['foto'] ?>" alt="Avatar" class="rounded-circle" />
                                                <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#foto<?= $row['id_pengaduan'] ?>">
                                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Lihat
                                                        Bukti</strong>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                    <td></td>
                                    <?php require 'foto.php' ?>
                                    <!-- Status Verifikasi Dengan Gaya  -->
                                    <td><span class="badge <?php if ($row['status'] == "proses") {
                                                                echo "bg-warning";
                                                            } else if ($row['status'] == "selesai") {
                                                                echo "bg-success";
                                                            } else if ($row['status'] == "tolak") {
                                                                echo "bg-danger";
                                                            } ?>"><?= $row['status']; ?></span></td>
                                    <td>
                                        <!-- Akhir VErifikasi -->
                                        <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable<?= $row['id_pengaduan'] ?>">
                                            <i class="fab fa-angular fa-lg text-danger"></i> <strong>Verifikasi &
                                                Laporan</strong>
                                        </button>
                                    </td>


                                    <!-- Awal Modal verifikasi & laporan -->
                                    <form action="" method="post">
                                        <div class="modal" id="modalScrollable<?= $row['id_pengaduan'] ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Verifikasi & Laporan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- awal-->
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <input type="text" name="id_pengaduan" value="<?= $row['id_pengaduan']  ?>" hidden>

                                                            <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Nik</label>
                                                            <input type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1" value="<?= $row['nik'] ?>" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect1" class="form-label">Verifikasi</label>
                                                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status[]">
                                                                <option value="tolak" name="status[]">Tolak</option>
                                                                <option value="proses" name="status[]">Proses</option>
                                                                <option value="selesai" name="status[]">Selesai</option>
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
                                                            <textarea class="form-control-plaintext" id="exampleFormControlTextarea1" rows="3" placeholder="<?= $row['isi_laporan'] ?>" readonly></textarea>
                                                        </div>
                                                        <!-- akhir -->
                                                        <br>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary" name="verifikasiLaporan">simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    <!-- akhir Modal Verifikasi & Laporan -->

                                    <td>
                                        <a class="text-primary" href="hapus.php?table=pengaduan&id=<?php echo $row['id_pengaduan']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </td>
                                    <td>
                                        <a class="text-primary" href="?us=tanggapan"><i class="bx bx-mail-send me-1"></i>
                                            Tanggapi</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>

<?php
}
