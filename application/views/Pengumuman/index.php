<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Pengumuman
            </h6>

            <button class="btn btn-success btn-sm"
                    data-toggle="modal"
                    data-target="#modalTambah">

                <i class="fas fa-plus"></i>
                Tambah Pengumuman

            </button>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="dataTable">

                    <thead class="thead-light">

                        <tr>

                            <th width="5%">No</th>
                            <th width="12%">Gambar</th>
                            <th>Judul</th>
                            <th width="12%">Tanggal</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php $no=1; foreach($pengumuman as $p): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td class="text-center">

                                <?php if($p->gambar!=""): ?>

                                    <img src="<?= base_url('uploads/pengumuman/'.$p->gambar); ?>"
                                         style="width:90px;height:70px;object-fit:cover;"
                                         class="img-thumbnail">

                                <?php else: ?>

                                    <span>-</span>

                                <?php endif; ?>

                            </td>

                            <td><?= $p->judul; ?></td>

                            <td><?= date('d-m-Y',strtotime($p->tanggal)); ?></td>

                            <td>

                                <?php if($p->status=="publish"): ?>

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

                                <button class="btn btn-info btn-sm"
                                        data-toggle="modal"
                                        data-target="#detail<?= $p->id_pengumuman ?>">

                                    <i class="fas fa-eye"></i>

                                </button>

                                <button class="btn btn-warning btn-sm"
                                        data-toggle="modal"
                                        data-target="#edit<?= $p->id_pengumuman ?>">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn btn-danger btn-sm"
                                        data-toggle="modal"
                                        data-target="#hapus<?= $p->id_pengumuman ?>">

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

<!-- Modal Tambah Pengumuman -->
<div class="modal fade" id="modalTambah">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('pengumuman/simpan'); ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        Tambah Pengumuman
                    </h5>

                    <button type="button"
                            class="close text-white"
                            data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul Pengumuman</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Isi Pengumuman</label>

                        <textarea name="isi"
                                  rows="8"
                                  class="form-control"
                                  required></textarea>

                    </div>

                    <div class="form-row">

                        <div class="col-md-6">

                            <label>Tanggal</label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   value="<?= date('Y-m-d'); ?>"
                                   required>

                        </div>

                        <div class="col-md-6">

                            <label>Status</label>

                            <select name="status"
                                    class="form-control">

                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>

                            </select>

                        </div>

                    </div>

                    <br>

                    <div class="form-group">

                        <label>Gambar</label>

                        <input type="file"
                               name="gambar"
                               class="form-control-file">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit"
                            class="btn btn-success">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<!-- Modal Detail Pengumuman -->
 <?php foreach($pengumuman as $p): ?>

<div class="modal fade" id="detail<?= $p->id_pengumuman; ?>">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header bg-info text-white">

                <h5 class="modal-title">
                    Detail Pengumuman
                </h5>

                <button class="close text-white"
                        data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <?php if($p->gambar!=""): ?>

                    <img src="<?= base_url('uploads/pengumuman/'.$p->gambar); ?>"
                         class="img-fluid img-thumbnail mb-3">

                <?php endif; ?>

                <table class="table table-bordered">

                    <tr>
                        <th width="150">Judul</th>
                        <td><?= $p->judul; ?></td>
                    </tr>

                    <tr>
                        <th>Tanggal</th>
                        <td><?= date('d F Y',strtotime($p->tanggal)); ?></td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>

                            <?php if($p->status=="publish"): ?>

                                <span class="badge badge-success">
                                    Publish
                                </span>

                            <?php else: ?>

                                <span class="badge badge-secondary">
                                    Draft
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                </table>

                <h5>Isi Pengumuman</h5>

                <div class="border rounded p-3">

                    <?= nl2br($p->isi); ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>
<!-- Modal Edit Pengumuman -->
 <?php foreach($pengumuman as $p): ?>

<div class="modal fade" id="edit<?= $p->id_pengumuman; ?>">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('pengumuman/update'); ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <input type="hidden"
                       name="id_pengumuman"
                       value="<?= $p->id_pengumuman; ?>">

                <div class="modal-header bg-warning">

                    <h5>Edit Pengumuman</h5>

                    <button class="close"
                            data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul</label>

                        <input type="text"
                               name="judul"
                               value="<?= $p->judul; ?>"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Isi Pengumuman</label>

                        <textarea name="isi"
                                  rows="8"
                                  class="form-control"><?= $p->isi; ?></textarea>

                    </div>

                    <div class="form-row">

                        <div class="col-md-6">

                            <label>Tanggal</label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   value="<?= date('Y-m-d',strtotime($p->tanggal)); ?>">

                        </div>

                        <div class="col-md-6">

                            <label>Status</label>

                            <select name="status"
                                    class="form-control">

                                <option value="publish"
                                <?= ($p->status=="publish")?'selected':''; ?>>
                                    Publish
                                </option>

                                <option value="draft"
                                <?= ($p->status=="draft")?'selected':''; ?>>
                                    Draft
                                </option>

                            </select>

                        </div>

                    </div>

                    <br>

                    <div class="form-group">

                        <label>Ganti Gambar</label>

                        <input type="file"
                               name="gambar"
                               class="form-control-file">

                    </div>

                    <?php if($p->gambar!=""): ?>

                        <img src="<?= base_url('uploads/pengumuman/'.$p->gambar); ?>"
                             width="180"
                             class="img-thumbnail mt-2">

                    <?php endif; ?>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary"
                            data-dismiss="modal">

                        Batal

                    </button>

                    <button class="btn btn-warning">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endforeach; ?>
<!-- Modal Hapus Pengumuman -->
<?php foreach($pengumuman as $p): ?>

<div class="modal fade" id="hapus<?= $p->id_pengumuman; ?>">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5>Hapus Pengumuman</h5>

                <button class="close text-white"
                        data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>

            <div class="modal-body text-center">

                <i class="fas fa-trash fa-4x text-danger mb-3"></i>

                <h5>

                    Yakin ingin menghapus pengumuman

                </h5>

                <strong>

                    <?= $p->judul; ?>

                </strong>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary"
                        data-dismiss="modal">

                    Batal

                </button>

                <a href="<?= base_url('pengumuman/hapus/'.$p->id_pengumuman); ?>"
                   class="btn btn-danger">

                    Hapus

                </a>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>