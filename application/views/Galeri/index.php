<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambahGaleri">
            <i class="fas fa-plus"></i> Tambah Galeri
        </button>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                Data Galeri
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="dataTable">

                    <thead class="thead-light">

                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="15%">Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="15%">Tanggal</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;
                    foreach($galeri as $g):
                    ?>

                        <tr>

                            <td class="text-center"><?= $no++; ?></td>

                            <td class="text-center">

                                <img src="<?= base_url('uploads/galeri/'.$g->gambar); ?>"
                                     width="120"
                                     class="img-thumbnail">

                            </td>

                            <td><?= $g->judul; ?></td>

                            <td>

                                <?= character_limiter(strip_tags($g->deskripsi),80); ?>

                            </td>

                            <td class="text-center">

                                <?= date('d-m-Y',strtotime($g->tanggal)); ?>

                            </td>

                            <td class="text-center">

                                <?php if($g->status=='publish'): ?>

                                    <span class="badge badge-success">
                                        Publish
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-secondary">
                                        Draft
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <button
                                    class="btn btn-warning btn-sm"
                                    data-toggle="modal"
                                    data-target="#edit<?= $g->id_galeri; ?>">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    data-toggle="modal"
                                    data-target="#hapus<?= $g->id_galeri; ?>">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Modal Tambah Galeri -->
 <div class="modal fade" id="modalTambahGaleri">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('galeri/tambah'); ?>" method="post" enctype="multipart/form-data">

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">Tambah Galeri</h5>

                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul</label>

                        <input type="text" name="judul" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea name="deskripsi" class="form-control" rows="4"></textarea>

                    </div>

                    <div class="form-group">

                        <label>Upload Gambar</label>

                        <input type="file" name="gambar" class="form-control-file" required>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-dismiss="modal">
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

<!-- Modal Edit Galeri -->
 <?php foreach($galeri as $g): ?>

<div class="modal fade" id="edit<?= $g->id_galeri; ?>">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('galeri/update'); ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_galeri" value="<?= $g->id_galeri; ?>">

                <input type="hidden" name="gambar_lama" value="<?= $g->gambar; ?>">

                <div class="modal-header bg-warning">

                    <h5 class="modal-title">
                        Edit Galeri
                    </h5>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul</label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="<?= $g->judul; ?>"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="4"><?= $g->deskripsi; ?></textarea>

                    </div>

                    <div class="form-group">

                        <label>Gambar Saat Ini</label>

                        <br>

                        <img
                            src="<?= base_url('uploads/galeri/'.$g->gambar); ?>"
                            class="img-thumbnail mb-3"
                            width="250">

                    </div>

                    <div class="form-group">

                        <label>Ganti Gambar</label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control-file">

                        <small class="text-muted">

                            Kosongkan jika tidak ingin mengganti gambar.

                        </small>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option value="publish"
                                <?= ($g->status=="publish")?'selected':''; ?>>
                                Publish
                            </option>

                            <option value="draft"
                                <?= ($g->status=="draft")?'selected':''; ?>>
                                Draft
                            </option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
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

<!-- Modal Hapus Galeri -->
 <?php foreach($galeri as $g): ?>

<div class="modal fade" id="hapus<?= $g->id_galeri; ?>">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('galeri/hapus'); ?>" method="post">

                <input
                    type="hidden"
                    name="id_galeri"
                    value="<?= $g->id_galeri; ?>">

                <input
                    type="hidden"
                    name="gambar"
                    value="<?= $g->gambar; ?>">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title">

                        Hapus Galeri

                    </h5>

                    <button
                        type="button"
                        class="close text-white"
                        data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body text-center">

                    <img
                        src="<?= base_url('uploads/galeri/'.$g->gambar); ?>"
                        width="220"
                        class="img-thumbnail mb-3">

                    <h5>

                        Yakin ingin menghapus galeri ini?

                    </h5>

                    <strong>

                        <?= $g->judul; ?>

                    </strong>

                </div>

                <div class="modal-footer">

                    <button
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger">

                        <i class="fas fa-trash"></i>

                        Hapus

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endforeach; ?>