<div class="modal" id="detail<?= $row['id_pengaduan'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Bukti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row mb-3">
                <img class="card-img-top" src="uploads/images/<?= $row['foto'] ?>" alt="Card image cap" />
            </div>
        </div>
    </div>
</div>