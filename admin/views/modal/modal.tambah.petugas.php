<form action="" method="post">
    <div class="modal" id="tambahPetugas<?= $row['id_petugas'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- awal-->
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" value="petugas" name="level" hidden>
                        <label for="defaultFormControlInput" class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Nama" aria-describedby="defaultFormControlHelp" name="nama" />
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Username</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Username" aria-describedby="defaultFormControlHelp" name="username" />
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Telepom</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="08xxxx" aria-describedby="defaultFormControlHelp" name="no_telp" />
                    </div>
                    <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Password</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Password" aria-describedby="defaultFormControlHelp" name="password" />
                    </div>
                    <div>
                    </div>
                    <!-- akhir -->
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" name="tambahPetugas">simpan</button>
                    </div>
                </div>
            </div>
        </div>
</form>