<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Pengaduan Saya
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no=1; ?>
                    <?php foreach($pengaduan as $p): ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y', strtotime($p['created_at'])); ?></td>
                        <td><?= $p['nama_kategori']; ?></td>
                        <td><?= $p['judul']; ?></td>
                        <td><?= $p['status']; ?></td>
                        <td>
                            <a href="<?= base_url('pengaduan/pengaduan_saya/detail/'.$p['id']); ?>"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>