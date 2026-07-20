<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">
                    <label>Alamat</label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"><?= $kontak['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Telepon</label>

                    <input type="text"
                           name="telepon"
                           class="form-control"
                           value="<?= $kontak['telepon']; ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?= $kontak['email']; ?>">
                </div>

                <div class="form-group">
                    <label>WhatsApp</label>

                    <input type="text"
                           name="whatsapp"
                           class="form-control"
                           value="<?= $kontak['whatsapp']; ?>">
                </div>

                <div class="form-group">
                    <label>Jam Pelayanan</label>

                    <input type="text"
                           name="jam_pelayanan"
                           class="form-control"
                           value="<?= $kontak['jam_pelayanan']; ?>">
                </div>

                <div class="form-group">
                    <label>Link Google Maps Embed</label>

                    <textarea
                        name="maps"
                        class="form-control"
                        rows="4"><?= $kontak['maps']; ?></textarea>
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