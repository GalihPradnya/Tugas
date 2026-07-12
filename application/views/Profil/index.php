<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">

        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Pengaturan Profil Desa
            </h6>
        </div> -->

        <div class="card-body">

           <form action="<?= base_url('profil/updateProfil'); ?>" method="post" enctype="multipart/form-data">

                <!-- ===================== -->
                <!-- Gambar Profil -->
                <!-- ===================== -->

                <div class="row">

                    <div class="col-md-4">

                        <label><strong>Gambar Profil Desa</strong></label>

                        <img src="<?= base_url('uploads/profil/'.$profil->gambar); ?>"
                            class="img-fluid rounded shadow mb-3">

                        <input type="file"
                                name="gambar"
                                class="form-control">

                    </div>

                    <div class="col-md-8">

                        <label><strong>Tentang Desa</strong></label>

                        <textarea
                        name="tentang"
                        class="form-control"
                        rows="12"><?= $profil->tentang; ?></textarea>
                            

                    </div>

                </div>

                <hr>

                <!-- ===================== -->
                <!-- VISI -->
                <!-- ===================== -->

                <div class="form-group">

                    <label>
                        <strong>Visi Desa</strong>
                    </label>

                    <textarea
                    name="visi"
                    class="form-control"
                    rows="4"><?= $profil->visi; ?></textarea>

                </div>

                <hr>

                <!-- ===================== -->
                <!-- MISI -->
                <!-- ===================== -->

                <div class="d-flex justify-content-between mb-3">

                    <h5>Misi Desa</h5>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#modalTambahMisi">

                        <i class="fas fa-plus"></i>
                        Tambah Misi

                    </button>

                </div>

                <table class="table table-bordered">

                    <thead class="thead-light">

                        <tr>

                            <th width="5%">No</th>

                            <th>Isi Misi</th>

                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($misi)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($misi as $row) : ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $row->isi_misi; ?></td>

                            <td>

                            <button
                                type="button"
                                class="btn btn-warning btn-sm"
                                data-toggle="modal"
                                data-target="#editMisi<?= $row->id; ?>">

                                <i class="fas fa-edit"></i>

                            </button>

                                <a href="<?= base_url('profil/hapusMisi/'.$row->id); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus misi ini?')">

                                    <i class="fas fa-trash"></i>

                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                        <?php else : ?>

                        <tr>
                            <td colspan="3" class="text-center">
                                Belum ada data misi.
                            </td>
                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

                <hr>

                <!-- ===================== -->
                <!-- DATA SINGKAT -->
                <!-- ===================== -->

                <h5 class="mb-3">
                    Data Singkat Desa
                </h5>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Luas Wilayah (Ha)</label>

                            <input
                            type="number"
                            name="luas_wilayah"
                            class="form-control"
                            value="<?= $profil->luas_wilayah; ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Jumlah Penduduk</label>

                            <input
                            type="number"
                            name="jumlah_penduduk"
                            class="form-control"
                            value="<?= $profil->jumlah_penduduk; ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Jumlah Dusun</label>

                           <input
                            type="number"
                            name="jumlah_dusun"
                            class="form-control"
                            value="<?= $profil->jumlah_dusun; ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Jumlah RT</label>

                            <input
                            type="number"
                            name="jumlah_rt"
                            class="form-control"
                            value="<?= $profil->jumlah_rt; ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Jumlah RW</label>

                            <input
                            type="number"
                            name="jumlah_rw"
                            class="form-control"
                            value="<?= $profil->jumlah_rw; ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Kode Pos</label>

                            <input
                            type="text"
                            name="kode_pos"
                            class="form-control"
                            value="<?= $profil->kode_pos; ?>">

                        </div>

                    </div>

                </div>

                <div class="text-right mt-4">

                    <button type="submit" class="btn btn-success">

                        <i class="fas fa-save"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- MODAL TAMBAH MISI -->
<!-- ================================================= -->

<div class="modal fade" id="modalTambahMisi" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <form action="<?= base_url('profil/tambahMisi'); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Misi
                    </h5>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Isi Misi</label>

                        <textarea name="isi_misi" class="form-control" rows="4" required></textarea>

                    </div>

                    <div class="form-group">

                        <label>Urutan</label>

                        <input type="number" name="urutan" class="form-control" placeholder="Contoh: 1" required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit" class="btn btn-primary">

                        <i class="fas fa-save"></i> Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Modal Edit Misi -->

<?php foreach($misi as $row) : ?>

<div class="modal fade" id="editMisi<?= $row->id; ?>" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= base_url('profil/editMisi/'.$row->id); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Edit Misi

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

                        <label>Isi Misi</label>

                        <textarea
                            name="isi_misi"
                            class="form-control"
                            rows="4"
                            required><?= $row->isi_misi; ?></textarea>

                    </div>

                    <div class="form-group">

                        <label>Urutan</label>

                        <input
                            type="number"
                            name="urutan"
                            class="form-control"
                            value="<?= $row->urutan; ?>"
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