<h1 class="h3 mb-4 text-gray-800">
    Surat Saya
</h1>

<?= $this->session->flashdata('message'); ?>
<div class="alert alert-info">
    <strong>Keterangan Status:</strong><br>
    <span class="badge badge-warning">Menunggu Verifikasi</span> = Menunggu persetujuan Kepala Wilayah.<br>
    <span class="badge badge-primary">Diproses Admin</span> = Pengajuan telah disetujui Kepala Wilayah dan sedang diproses oleh Admin.<br>
    <span class="badge badge-success">Selesai</span> = Surat telah selesai dan dapat diunduh.<br>
    <span class="badge badge-danger">Ditolak</span> = Pengajuan tidak dapat diproses.
</div>

<table class="table table-bordered">

    <thead>

        <tr>
            <th width="5%">No</th>
            <th>Jenis Surat</th>
            <th>Status</th>
            <th>Tanggal Pengajuan</th>
            <th width="20%">Aksi</th>
        </tr>

    </thead>

    <tbody>

        <?php $no = 1; ?>

        <?php foreach($surat as $s): ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $s['nama_surat']; ?></td>

            <td>

                <?php if($s['status'] == 'Menunggu Verifikasi'): ?>

                    <span class="badge badge-warning">
                        Menunggu Verifikasi
                    </span>

                <?php elseif($s['status'] == 'Diproses Admin'): ?>

                    <span class="badge badge-primary">
                        Diproses Admin
                    </span>

                <?php elseif($s['status'] == 'Selesai'): ?>

                    <span class="badge badge-success">
                        Selesai
                    </span>

                    <?php elseif($s['status'] == 'Ditolak'): ?>

                        <span class="badge badge-danger">
                            Ditolak
                        </span>

                        <?php if(!empty($s['alasan_penolakan'])): ?>

                            <br><small class="text-danger">

                                Alasan:<br>
                                <?= nl2br($s['alasan_penolakan']); ?>

                            </small>

                        <?php endif; ?>

                    <?php endif; ?>

            </td>

            <td>
                <?= date('d-m-Y H:i', strtotime($s['created_at'])); ?>
            </td>

            <td>

                <?php if($s['status'] == 'Selesai' && !empty($s['file_hasil'])): ?>

                    <a target="_blank"
                       href="<?= base_url('uploads/hasil_surat/'.$s['file_hasil']); ?>"
                       class="btn btn-success btn-sm">

                        <i class="fas fa-download"></i>
                        Download

                    </a>

                <?php elseif($s['status'] == 'Menunggu Verifikasi'): ?>

                    <span class="text-warning">
                        Menunggu verifikasi Kepala Wilayah
                    </span>

                <?php elseif($s['status'] == 'Diproses Admin'): ?>

                    <span class="text-primary">
                        Sedang diproses Admin
                    </span>

                <?php elseif($s['status'] == 'Ditolak'): ?>

                    <span class="text-danger">
                        Pengajuan ditolak
                    </span>

                <?php endif; ?>

            </td>

        </tr>

        <?php endforeach; ?>

    </tbody>

</table>