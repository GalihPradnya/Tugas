<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Pemerintahan Desa
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <!-- ================================= -->
    <!-- KEPALA DESA -->
    <!-- ================================= -->

    <div class="card shadow mb-4">

        <div class="card-header">

            <h5>Kepala Desa</h5>

        </div>

        <div class="card-body">

            <form action="<?= base_url('pemerintahan/updateKepalaDesa'); ?>" method="post"
                enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-3">

                        <img src="<?= base_url('uploads/kepala_desa/'.$kepala_desa->foto); ?>"
                            class="img-fluid rounded">

                    </div>

                    <div class="col-md-9">

                        <div class="form-group">

                            <label>Nama Kepala Desa</label>

                            <input type="text" name="nama_kepala_desa" class="form-control"
                                value="<?= $kepala_desa->nama_kepala_desa; ?>">

                        </div>

                        <div class="form-group">

                            <label>Foto</label>

                            <input type="file" name="foto" class="form-control">

                        </div>

                        <button class="btn btn-success">

                            Simpan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- ================================= -->
    <!-- PERANGKAT DESA -->
    <!-- ================================= -->

    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between">

            <h5>Perangkat Desa</h5>

            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahPerangkat">

                Tambah Perangkat

            </button>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Foto</th>

                        <th>Jabatan</th>

                        <th>Nama</th>

                        <th>Urutan</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $no=1; ?>

                    <?php foreach($perangkat_desa as $row): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td>

                            <img src="<?= base_url('uploads/perangkat_desa/'.$row->foto); ?>" width="60">

                        </td>

                        <td><?= $row->jabatan; ?></td>

                        <td><?= $row->nama; ?></td>

                        <td><?= $row->urutan; ?></td>

                        <td>

                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editPerangkat<?= $row->id; ?>">

                                Edit

                            </button>

                            <a href="<?= base_url('pemerintahan/hapusPerangkat/'.$row->id); ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- ================================= -->
    <!-- LEMBAGA DESA -->
    <!-- ================================= -->

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">Lembaga Desa</h5>

            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambahLembaga">

                <i class="fas fa-plus"></i>
                Tambah Lembaga

            </button>

        </div>

        <div class="card-body">

            <?php if(!empty($lembaga_desa)) : ?>

            <?php foreach($lembaga_desa as $lembaga): ?>

            <div class="border rounded p-3 mb-4">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h5 class="mb-0">
                        <?= $lembaga->nama_lembaga; ?>
                    </h5>

                    <div>

                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                            data-target="#editLembaga<?= $lembaga->id; ?>">

                            <i class="fas fa-edit"></i>

                        </button>

                        <a href="<?= base_url('pemerintahan/hapusLembaga/'.$lembaga->id); ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Hapus lembaga ini?')">

                            <i class="fas fa-trash"></i>

                        </a>

                    </div>

                </div>

                <table class="table table-bordered table-striped">

                    <thead class="thead-light">

                        <tr>

                            <th width="30%">Jabatan</th>

                            <th>Nama</th>

                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($lembaga->anggota)) : ?>

                        <?php foreach($lembaga->anggota as $anggota): ?>

                        <tr>

                            <td><?= $anggota->jabatan; ?></td>

                            <td><?= $anggota->nama; ?></td>

                            <td>

                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editAnggota<?= $anggota->id; ?>">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <a href="<?= base_url('pemerintahan/hapusAnggota/'.$anggota->id); ?>"
                                    class="btn btn-danger btn-sm" onclick="return confirm('Hapus anggota?')">

                                    <i class="fas fa-trash"></i>

                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                        <?php else : ?>

                        <tr>

                            <td colspan="3" class="text-center">

                                Belum ada anggota.

                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

                <button class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#tambahAnggota<?= $lembaga->id; ?>">

                    <i class="fas fa-user-plus"></i>
                    Tambah Anggota

                </button>

            </div>

            <?php endforeach; ?>

            <?php else : ?>

            <div class="text-center">

                Belum ada lembaga desa.

            </div>

            <?php endif; ?>

        </div>

    </div>
    <!-- Modal Tambah Perangkat -->
    <div class="modal fade" id="modalTambahPerangkat">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= base_url('pemerintahan/tambahPerangkat');?>" method="post"
                    enctype="multipart/form-data">

                    <div class="modal-header">

                        <h5>Tambah Perangkat</h5>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Nama</label>

                            <input type="text" name="nama" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Jabatan</label>

                            <input type="text" name="jabatan" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Foto</label>

                            <input type="file" name="foto" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Urutan</label>

                            <input type="number" name="urutan" class="form-control">

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-primary">

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Modal Edit Perangkat -->
    <?php foreach($perangkat_desa as $row): ?>

    <div class="modal fade" id="editPerangkat<?= $row->id; ?>">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= base_url('pemerintahan/updatePerangkat/'.$row->id); ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="modal-header">

                        <h5>Edit Perangkat</h5>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Nama</label>

                            <input type="text" name="nama" class="form-control" value="<?= $row->nama; ?>">

                        </div>

                        <div class="form-group">

                            <label>Jabatan</label>

                            <input type="text" name="jabatan" class="form-control" value="<?= $row->jabatan; ?>">

                        </div>

                        <div class="form-group">

                            <label>Foto Baru</label>

                            <input type="file" name="foto" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Urutan</label>

                            <input type="number" name="urutan" value="<?= $row->urutan; ?>" class="form-control">

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-warning">

                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

    <!-- Modal Tambah Lembaga -->
    <!-- ================================= -->
    <!-- MODAL TAMBAH LEMBAGA -->
    <!-- ================================= -->

    <div class="modal fade" id="modalTambahLembaga" tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= base_url('pemerintahan/tambahLembaga'); ?>" method="post">

                    <div class="modal-header">

                        <h5 class="modal-title">
                            Tambah Lembaga Desa
                        </h5>

                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Nama Lembaga</label>

                            <input type="text" name="nama_lembaga" class="form-control" required>

                        </div>

                        <div class="form-group">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi" class="form-control" rows="4"></textarea>

                        </div>

                        <div class="form-group">

                            <label>Urutan</label>

                            <input type="number" name="urutan" class="form-control" value="1" required>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                            Batal

                        </button>

                        <button type="submit" class="btn btn-success">

                            <i class="fas fa-save"></i>

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Modal Edit Lembaga -->
    <!-- ================================= -->
    <!-- MODAL EDIT LEMBAGA -->
    <!-- ================================= -->

    <?php foreach($lembaga_desa as $lembaga) : ?>

    <div class="modal fade" id="editLembaga<?= $lembaga->id; ?>" tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= base_url('pemerintahan/editLembaga/'.$lembaga->id); ?>" method="post">

                    <div class="modal-header">

                        <h5 class="modal-title">

                            Edit Lembaga

                        </h5>

                        <button type="button" class="close" data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Nama Lembaga</label>

                            <input type="text" name="nama_lembaga" class="form-control"
                                value="<?= $lembaga->nama_lembaga; ?>" required>

                        </div>

                        <div class="form-group">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi" class="form-control"
                                rows="4"><?= $lembaga->deskripsi; ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>Urutan</label>

                            <input type="number" name="urutan" class="form-control" value="<?= $lembaga->urutan; ?>"
                                required>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                            Batal

                        </button>

                        <button type="submit" class="btn btn-warning">

                            <i class="fas fa-save"></i>

                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

    <!-- Modal Tambah Anggota Lembaga -->
     <!-- ================================= -->
<!-- MODAL TAMBAH ANGGOTA -->
<!-- ================================= -->

<?php foreach($lembaga_desa as $lembaga): ?>

<div class="modal fade"
     id="tambahAnggota<?= $lembaga->id; ?>"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <form action="<?= base_url('pemerintahan/tambahAnggota'); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Tambah Anggota

                        <br>

                        <small class="text-muted">
                            <?= $lembaga->nama_lembaga; ?>
                        </small>

                    </h5>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <input
                        type="hidden"
                        name="lembaga_id"
                        value="<?= $lembaga->id; ?>">

                    <div class="form-group">

                        <label>Jabatan</label>

                        <input
                            type="text"
                            name="jabatan"
                            class="form-control"
                            placeholder="Contoh : Ketua"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Nama</label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Masukkan Nama"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Urutan</label>

                        <input
                            type="number"
                            name="urutan"
                            class="form-control"
                            value="1"
                            required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endforeach; ?>

<!-- ================================= -->
<!-- MODAL EDIT ANGGOTA -->
<!-- ================================= -->

<?php foreach($lembaga_desa as $lembaga): ?>

<?php foreach($lembaga->anggota as $anggota): ?>

<div class="modal fade"
     id="editAnggota<?= $anggota->id; ?>"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('pemerintahan/editAnggota/'.$anggota->id); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Edit Anggota

                    </h5>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Jabatan</label>

                        <input
                            type="text"
                            name="jabatan"
                            class="form-control"
                            value="<?= $anggota->jabatan; ?>"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Nama</label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            value="<?= $anggota->nama; ?>"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Urutan</label>

                        <input
                            type="number"
                            name="urutan"
                            class="form-control"
                            value="<?= $anggota->urutan; ?>"
                            required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-warning">

                        <i class="fas fa-save"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endforeach; ?>

<?php endforeach; ?>

