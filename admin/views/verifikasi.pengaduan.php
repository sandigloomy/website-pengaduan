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
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
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