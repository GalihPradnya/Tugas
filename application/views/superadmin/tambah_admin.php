<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tambah Admin
    </h1>

    <?= validation_errors(
        '<div class="alert alert-danger">',
        '</div>'
    ); ?>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow">

        <div class="card-body">

            <form method="post" action="<?= base_url('superadmin/tambahAdmin'); ?>">

                <div class="form-group">

                    <label>Penduduk</label>

                    <select
                        name="penduduk_id"
                        class="form-control"
                        required>

                        <option value="">
                            -- Pilih Penduduk --
                        </option>

                        <?php foreach($penduduk as $p): ?>

                            <option value="<?= $p['id']; ?>">

                                <?= $p['nik']; ?> -
                                <?= $p['nama_lengkap']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="form-group">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= set_value('email'); ?>"
                        required>

                    <small class="text-muted">
                        Digunakan untuk notifikasi email.
                    </small>

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Simpan

                </button>

                <a
                    href="<?= base_url('superadmin/dataAdmin'); ?>"
                    class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>