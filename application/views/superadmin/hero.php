<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Hero Beranda
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card">
        <div class="card-body">

            <form method="post">

                <div class="form-group">
                    <label>Judul</label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="<?= $hero['judul']; ?>">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="4"><?= $hero['deskripsi']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Alamat</label>

                    <textarea name="alamat"
                              class="form-control"
                              rows="3"><?= $hero['alamat']; ?></textarea>
                </div>

                <button type="submit"
                        class="btn btn-success">

                    Simpan

                </button>

            </form>

        </div>
    </div>

</div>