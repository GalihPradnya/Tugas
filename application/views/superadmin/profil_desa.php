<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow">

        <div class="card-body">

            <form method="post" enctype="multipart/form-data">

                <div class="form-group">

                    <label>Nama Desa</label>

                    <input type="text"
                           name="nama_desa"
                           class="form-control"
                           value="<?= $logoDesa['nama_desa']; ?>"
                           required>

                </div>

                <div class="form-group">

                    <label>Logo Saat Ini</label>

                    <br>

                    <img src="<?= base_url('uploads/logo/' . $logoDesa['logo']); ?>"
                         width="120"
                         class="img-thumbnail mb-3">

                </div>

                <div class="form-group">

                    <label>Ganti Logo</label>

                    <input type="file"
                           name="logo"
                           class="form-control-file">

                    <small class="text-muted">
                        Format: JPG, JPEG, PNG (Max 2MB)
                    </small>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>