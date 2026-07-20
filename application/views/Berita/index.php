<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Berita
            </h6>

            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i> Tambah Berita
            </button>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                    <thead class="thead-light">

                        <tr>

                            <th width="5%">No</th>
                            <th width="12%">Gambar</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th width="12%">Tanggal</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($berita)): ?>

                            <?php $no = 1; foreach($berita as $b): ?>

                                <tr>

                                    <td><?= $no++; ?></td>

                                    <td class="text-center">

                                        <?php if($b->gambar != ""): ?>

                                            <img src="<?= base_url('uploads/berita/'.$b->gambar); ?>"
                                                 class="img-thumbnail"
                                                 style="width:90px; height:70px; object-fit:cover;">

                                        <?php else: ?>

                                            <span class="text-muted">-</span>

                                        <?php endif; ?>

                                    </td>

                                    <td>

                                        <strong><?= $b->judul; ?></strong>

                                    </td>

                                    <td><?= $b->penulis; ?></td>

                                    <td><?= date('d-m-Y', strtotime($b->tanggal)); ?></td>

                                    <td>

                                        <?php if($b->status == 'publish'): ?>

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

                                        <!-- Detail -->
                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-toggle="modal"
                                                data-target="#detail<?= $b->id_berita; ?>">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Edit -->
                                        <button type="button"
                                                class="btn btn-warning btn-sm"
                                                data-toggle="modal"
                                                data-target="#edit<?= $b->id_berita; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <a href="<?= base_url('berita/hapus/'.$b->id_berita); ?>"
                                           onclick="return confirm('Yakin ingin menghapus berita ini?')"
                                           class="btn btn-danger btn-sm">

                                            <i class="fas fa-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="7" class="text-center">
                                    Belum ada data berita.
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('berita/simpan'); ?>" method="post" enctype="multipart/form-data">

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">Tambah Berita</h5>

                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul Berita</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Isi Berita</label>

                        <textarea name="isi"
                                  rows="8"
                                  class="form-control"
                                  required></textarea>

                    </div>

                    <div class="form-row">

                        <div class="col-md-6">

                            <label>Penulis</label>

                            <input type="text"
                                   name="penulis"
                                   class="form-control">

                        </div>

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

                            <select name="status" class="form-control">

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

<!-- Modal Edit -->
<?php foreach($berita as $b): ?>

<div class="modal fade" id="edit<?= $b->id_berita ?>">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= base_url('berita/update') ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <input type="hidden"
                       name="id_berita"
                       value="<?= $b->id_berita ?>">

                <div class="modal-header bg-warning">

                    <h5>Edit Berita</h5>

                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Judul</label>

                        <input type="text"
                               name="judul"
                               value="<?= $b->judul ?>"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Isi Berita</label>

                        <textarea
                            name="isi"
                            rows="8"
                            class="form-control"><?= $b->isi ?></textarea>

                    </div>

                    <div class="form-row">

                        <div class="col-md-6">

                            <label>Penulis</label>

                            <input type="text"
                                   name="penulis"
                                   value="<?= $b->penulis ?>"
                                   class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label>Tanggal</label>

                            <input type="date"
                                   name="tanggal"
                                   value="<?= !empty($b->tanggal) ? date('Y-m-d', strtotime($b->tanggal)) : ''; ?>"
                                   class="form-control">

                        </div>

                    </div>

                    <br>

                    <div class="form-row">

                        <div class="col-md-6">

                            <label>Status</label>

                            <select name="status"
                                    class="form-control">

                                <option value="publish"
                                <?= ($b->status=="publish")?'selected':'' ?>>
                                    Publish
                                </option>

                                <option value="draft"
                                <?= ($b->status=="draft")?'selected':'' ?>>
                                    Draft
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label>Ganti Gambar</label>

                            <input type="file"
                                   name="gambar"
                                   class="form-control-file">

                        </div>

                    </div>

                    <br>

                    <?php if($b->gambar!=""): ?>

                        <img src="<?= base_url('uploads/berita/'.$b->gambar) ?>"
                             width="180"
                             class="img-thumbnail">

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

<!-- Modal Detail -->
 <?php foreach($berita as $b): ?>

<div class="modal fade" id="detail<?= $b->id_berita; ?>">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header bg-info text-white">

                <h5 class="modal-title">
                    Detail Berita
                </h5>

                <button class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-4">

                        <?php if($b->gambar!=""): ?>

                        <img src="<?= base_url('uploads/berita/'.$b->gambar) ?>"
                             class="img-fluid img-thumbnail">

                        <?php endif; ?>

                    </div>

                    <div class="col-md-8">

                        <table class="table table-bordered">

                            <tr>
                                <th width="150">Judul</th>
                                <td><?= $b->judul ?></td>
                            </tr>

                            <tr>
                                <th>Penulis</th>
                                <td><?= $b->penulis ?></td>
                            </tr>

                            <tr>
                                <th>Tanggal</th>
                                <td><?= date('d F Y',strtotime($b->tanggal)); ?></td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>

                                    <?php if($b->status=="publish"): ?>

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

                    </div>

                </div>

                <hr>

                <h5>Isi Berita</h5>

                <div class="border rounded p-3">

                    <?= nl2br($b->isi); ?>

                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary"
                        data-dismiss="modal">

                    Tutup

                </button>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>