<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Alamat
            </h6>

            <button
                class="btn btn-primary btn-sm"
                data-toggle="modal"
                data-target="#tambahAlamat">

                Tambah Alamat

            </button>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

        <thead>

            <tr>

                <th width="5%">No</th>
                <th>Nama Alamat</th>
                <th>Status</th>
                <th width="20%">Aksi</th>

            </tr>

        </thead>

        <tbody>

            <?php $no=1; foreach($alamat as $a): ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $a['nama_alamat']; ?></td>

                <td><?= $a['status']; ?></td>

                <td>

                    <button
                        class="btn btn-warning btn-sm"
                        data-toggle="modal"
                        data-target="#edit<?= $a['id']; ?>">

                        Edit

                    </button>

                    <a
                        href="<?= base_url('surat/alamat/hapus/'.$a['id']); ?>"
                        onclick="return confirm('Yakin hapus data?')"
                        class="btn btn-danger btn-sm">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
                </div>

        </div>

    </div>

</div>
<div class="modal fade" id="tambahAlamat">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('surat/alamat/tambah'); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Alamat
                    </h5>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                <div class="form-group">

                    <label>Nama Alamat</label>

                    <input
                        type="text"
                        name="nama_alamat"
                        class="form-control"
                        required>

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-control">

                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>

                    </select>

                </div>

            </div>

                <div class="modal-footer">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<?php foreach($alamat as $a): ?>

<div class="modal fade" id="edit<?= $a['id']; ?>">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('surat/alamat/edit/'.$a['id']); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Alamat
                    </h5>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                <div class="form-group">

                <label>Nama Alamat</label>

                    <input
                        type="text"
                        name="nama_alamat"
                        class="form-control"
                        value="<?= $a['nama_alamat']; ?>"
                        required>

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-control">

                        <option value="aktif"
                            <?= $a['status']=='aktif' ? 'selected' : ''; ?>>
                            Aktif
                        </option>

                        <option value="nonaktif"
                            <?= $a['status']=='nonaktif' ? 'selected' : ''; ?>>
                            Nonaktif
                        </option>

                    </select>

                </div>

            </div>

                <div class="modal-footer">

                    <button
                        type="submit"
                        class="btn btn-success">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endforeach; ?>