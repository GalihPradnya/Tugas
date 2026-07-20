<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Pendatang Saya
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $no=1; ?>

                        <?php foreach($pendatang as $p): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>
                                <?= date('d-m-Y', strtotime($p['created_at'])); ?>
                            </td>

                            <td><?= $p['nama']; ?></td>

                            <td><?= $p['nik']; ?></td>

                            <td>

                                <?php if($p['status']=='Menunggu'): ?>

                                    <span class="badge badge-warning">
                                        Menunggu
                                    </span>

                                <?php elseif($p['status']=='Disetujui'): ?>

                                    <span class="badge badge-success">
                                        Disetujui
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-danger">
                                        Ditolak
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a href="<?= base_url('user/pendatang_saya/detail/'.$p['id']); ?>"
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

</div>