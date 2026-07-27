<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Laporan Pendatang
    </h1>

    <div class="card shadow">

        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Pendatang
            </h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>
                            <th width="35%">NIK</th>
                            <td><?= $laporan['nik']; ?></td>
                        </tr>

                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $laporan['nama_lengkap']; ?></td>
                        </tr>

                        <tr>
                            <th>Tempat Lahir</th>
                            <td><?= $laporan['tempat_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>
                                <?= !empty($laporan['tanggal_lahir']) ? date('d-m-Y',strtotime($laporan['tanggal_lahir'])) : '-'; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                <?= $laporan['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Nomor HP</th>
                            <td><?= $laporan['nomor_hp']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?= !empty($laporan['email']) ? $laporan['email'] : '-'; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Pekerjaan</th>
                            <td><?= $laporan['pekerjaan']; ?></td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>
                            <th width="35%">Alamat Asal</th>
                            <td><?= $laporan['alamat_asal']; ?></td>
                        </tr>

                        <tr>
                            <th>Alamat Tinggal</th>
                            <td><?= $laporan['alamat_tinggal']; ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Datang</th>
                            <td>
                                <?= !empty($laporan['tanggal_datang']) ? date('d-m-Y',strtotime($laporan['tanggal_datang'])) : '-'; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Tempat Tinggal</th>
                            <td><?= $laporan['tempat_tinggal']; ?></td>
                        </tr>

                        <tr>
                            <th>Lama Tinggal</th>
                            <td><?= $laporan['lama_tinggal']; ?></td>
                        </tr>

                        <tr>
                            <th>Keterangan</th>
                            <td><?= nl2br($laporan['keterangan']); ?></td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                <?php if($laporan['status']=='Menunggu'): ?>

                                    <span class="badge badge-warning">
                                        Menunggu
                                    </span>

                                <?php elseif($laporan['status']=='Disetujui'): ?>

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

                    </table>

                </div>

            </div>

            <?php if($laporan['status']=='Menunggu'): ?>

            <hr>

            <div class="text-right">

                <a href="<?= base_url('pendatang/laporan_pendatang_admin/setujui/'.$laporan['id']); ?>"
                   class="btn btn-success"
                   onclick="return confirm('Setujui laporan ini?')">

                    <i class="fas fa-check"></i>
                    Setujui

                </a>

                    <a href="<?= base_url('pendatang/laporan_pendatang_admin/tolak/'.$laporan['id']); ?>"
                    class="btn btn-danger">

                        <i class="fas fa-times"></i>
                        Tolak

                    </a>

            </div>

            <?php endif; ?>

            <?php if($laporan['status']=='Ditolak' && !empty($laporan['alasan_penolakan'])): ?>

                <hr>

                <div class="alert alert-danger">

                    <strong>Alasan Penolakan :</strong><br>

                    <?= nl2br($laporan['alasan_penolakan']); ?>

                </div>

            <?php endif; ?>

            <hr>

            <a href="<?= base_url('pendatang/laporan_pendatang_admin'); ?>"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </div>

</div>