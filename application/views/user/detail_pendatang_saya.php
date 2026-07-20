<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pendatang
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="250">NIK</th>
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
                    <th>Tanggal Datang</th>
                    <td><?= $pendatang['tanggal_datang']; ?></td>
                </tr>

                <tr>
                    <th>Lama Tinggal</th>
                    <td><?= $pendatang['lama_tinggal']; ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <?php if($pendatang['status']=='Menunggu'): ?>

                            <span class="badge badge-warning">
                                Menunggu
                            </span>

                        <?php elseif($pendatang['status']=='Disetujui'): ?>

                            <span class="badge badge-success">
                                Disetujui
                            </span>

                        <?php else: ?>

                            <span class="badge badge-danger">
                                Ditolak
                            </span>

                        <?php endif; ?>

                    </td>
                </tr>

                <tr>
                    <th>Keterangan Admin</th>
                    <td>

                        <?= !empty($pendatang['keterangan'])
                            ? nl2br($pendatang['keterangan'])
                            : '<span class="text-muted">Belum ada keterangan.</span>'; ?>

                    </td>
                </tr>

            </table>

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

            <a href="<?= base_url('pendatang_saya'); ?>"
               class="btn btn-dark">

                Kembali

            </a>

        </div>

    </div>

</div>