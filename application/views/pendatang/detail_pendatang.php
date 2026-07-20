<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pendatang
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <h5>Foto Pendatang</h5>

                    <?php if($pendatang['foto_warga']) : ?>

                        <img
                            src="<?= base_url('uploads/pendatang/'.$pendatang['foto_warga']); ?>"
                            class="img-fluid img-thumbnail">

                    <?php endif; ?>

                </div>

                <div class="col-md-8">

                    <table class="table">

                        <tr>
                            <th width="200">NIK</th>
                            <td><?= $pendatang['nik']; ?></td>
                        </tr>

                        <tr>
                            <th>Nama</th>
                            <td><?= $pendatang['nama']; ?></td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?= $pendatang['jenis_kelamin']; ?></td>
                        </tr>

                        <tr>
                            <th>Tempat Lahir</th>
                            <td><?= $pendatang['tempat_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?= $pendatang['tanggal_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th>Telepon</th>
                            <td><?= $pendatang['telepon']; ?></td>
                        </tr>

                        <tr>
                            <th>Alamat Asal</th>
                            <td><?= $pendatang['alamat_asal']; ?></td>
                        </tr>

                        <tr>
                            <th>Alamat Tinggal</th>
                            <td><?= $pendatang['alamat_tinggal']; ?></td>
                        </tr>

                        <tr>
                            <th>Tujuan Datang</th>
                            <td><?= $pendatang['tujuan_datang']; ?></td>
                        </tr>

                        <tr>
                            <th>Lama Tinggal</th>
                            <td><?= $pendatang['lama_tinggal']; ?></td>
                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <h5>Dokumen</h5>

            <a target="_blank"
               href="<?= base_url('uploads/pendatang/'.$pendatang['foto_ktp']); ?>"
               class="btn btn-primary">

                Lihat KTP

            </a>

            <?php if(!empty($pendatang['foto_kk'])): ?>

            <a target="_blank"
               href="<?= base_url('uploads/pendatang/'.$pendatang['foto_kk']); ?>"
               class="btn btn-secondary">

                Lihat KK

            </a>

            <?php endif; ?>

            <hr>

            <form action="<?= base_url('pendatang/pendatang_admin/updateStatus'); ?>"
                  method="post">

                <input type="hidden"
                       name="id"
                       value="<?= $pendatang['id']; ?>">

                <div class="form-group">

                    <label>Status</label>

                    <select name="status"
                            class="form-control">

                        <option value="Menunggu">Menunggu</option>

                        <option value="Disetujui">Disetujui</option>

                        <option value="Ditolak">Ditolak</option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Keterangan</label>

                    <textarea
                        name="keterangan"
                        class="form-control"
                        rows="4"><?= $pendatang['keterangan']; ?></textarea>

                </div>

                <button class="btn btn-success">

                    Simpan Verifikasi

                </button>

            </form>

        </div>

    </div>

</div>