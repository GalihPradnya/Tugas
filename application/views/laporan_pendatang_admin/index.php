<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Laporan Pendatang
    </h1>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Laporan Pendatang
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover" width="100%" cellspacing="0">

                    <thead class="thead-light">

                        <tr>
                            <th width="5%">No</th>
                            <th>Pelapor</th>
                            <th>Nama Pendatang</th>
                            <th>Alamat Asal</th>
                            <th>Tanggal Lapor</th>
                            <th width="15%">Status</th>
                            <th width="12%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if (empty($laporan)) : ?>

                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada laporan pendatang.
                                </td>
                            </tr>

                        <?php else : ?>

                            <?php
                            $no = 1;
                            foreach ($laporan as $l) :
                            ?>

                                <tr>

                                    <td><?= $no++; ?></td>

                                    <td><?= htmlspecialchars($l['name']); ?></td>

                                    <td><?= htmlspecialchars($l['nama_lengkap']); ?></td>

                                    <td><?= htmlspecialchars($l['alamat_asal']); ?></td>

                                    <td>
                                        <?= date('d-m-Y', strtotime($l['created_at'])); ?>
                                    </td>

                                    <td class="text-center">

                                        <?php if ($l['status'] == 'Menunggu') : ?>

                                            <span class="badge badge-warning">
                                                Menunggu
                                            </span>

                                        <?php elseif ($l['status'] == 'Disetujui') : ?>

                                            <span class="badge badge-success">
                                                Disetujui
                                            </span>

                                        <?php else : ?>

                                            <span class="badge badge-danger">
                                                Ditolak
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="text-center">

                                        <a href="<?= base_url('pendatang/laporan_pendatang_admin/detail/' . $l['id']); ?>"
                                            class="btn btn-info btn-sm">

                                            <i class="fas fa-eye"></i>
                                            Detail

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>