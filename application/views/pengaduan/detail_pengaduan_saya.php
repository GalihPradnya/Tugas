<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengaduan
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Informasi Pengaduan
            </h6>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Kategori</th>
                    <td><?= $pengaduan['nama_kategori']; ?></td>
                </tr>

                <tr>
                    <th>Judul</th>
                    <td><?= $pengaduan['judul']; ?></td>
                </tr>

                <tr>
                    <th>Lokasi</th>
                    <td><?= $pengaduan['lokasi']; ?></td>
                </tr>

                <tr>
                    <th>Isi Pengaduan</th>
                    <td><?= nl2br($pengaduan['isi_pengaduan']); ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <?php if($pengaduan['status'] == 'Masuk'): ?>

                            <span class="badge badge-warning">
                                Masuk
                            </span>

                        <?php elseif($pengaduan['status'] == 'Diproses'): ?>

                            <span class="badge badge-info">
                                Diproses
                            </span>

                        <?php elseif($pengaduan['status'] == 'Selesai'): ?>

                            <span class="badge badge-success">
                                Selesai
                            </span>

                        <?php else: ?>

                            <span class="badge badge-danger">
                                Ditolak
                            </span>

                        <?php endif; ?>

                    </td>
                </tr>

                <tr>
                    <th>Tanggapan Admin</th>
                    <td>

                        <?php if(!empty($pengaduan['tanggapan'])): ?>

                            <?= nl2br($pengaduan['tanggapan']); ?>

                        <?php else: ?>

                            <span class="text-muted">
                                Belum ada tanggapan.
                            </span>

                        <?php endif; ?>

                    </td>
                </tr>

                <?php if(!empty($pengaduan['bukti'])): ?>

                <tr>

                    <th>Bukti Lampiran</th>

                    <td>

                        <a href="<?= base_url('uploads/pengaduan/'.$pengaduan['bukti']); ?>"
                           target="_blank"
                           class="btn btn-primary btn-sm">

                            Lihat Bukti

                        </a>

                    </td>

                </tr>

                <?php endif; ?>

            </table>

            <a href="<?= base_url('pengaduan/pengaduan_saya/'); ?>"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>