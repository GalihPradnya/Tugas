<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Surat Saya
    </h1>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            <?php $no = 1; ?>

            <?php foreach($surat as $s): ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $s['nama_surat']; ?></td>

                <td>

                    <?php if($s['status'] == 'Menunggu'): ?>

                        <span class="badge badge-warning">
                            Menunggu
                        </span>

                    <?php elseif($s['status'] == 'Diproses'): ?>

                        <span class="badge badge-primary">
                            Diproses
                        </span>

                    <?php elseif($s['status'] == 'Selesai'): ?>

                        <span class="badge badge-success">
                            Selesai
                        </span>

                    <?php elseif($s['status'] == 'Ditolak'): ?>

                        <span class="badge badge-danger">
                            Ditolak
                        </span>

                    <?php endif; ?>

                </td>

                <td><?= $s['created_at']; ?></td>
                <td>

                <?php if($s['status'] == 'Selesai' && !empty($s['file_hasil'])): ?>

                    <a target="_blank"
                    href="<?= base_url('uploads/surat_hasil/'.$s['file_hasil']); ?>"
                    class="btn btn-success btn-sm">

                        Download Surat

                    </a>

                <?php else: ?>

                    -

                <?php endif; ?>

                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>