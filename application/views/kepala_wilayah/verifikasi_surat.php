<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Verifikasi Pengajuan Surat
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Pengajuan Menunggu Verifikasi
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%">

                    <thead class="thead-light">

                        <tr>
                            <th width="5%">No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($pengajuan as $p): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $p['nik']; ?></td>

                            <td><?= $p['nama_lengkap']; ?></td>

                            <td><?= $p['nama_surat']; ?></td>

                            <td>
                                <?= date('d-m-Y', strtotime($p['created_at'])); ?>
                            </td>

                            <td>

                                <span class="badge badge-warning">
                                    <?= $p['status']; ?>
                                </span>

                            </td>

                            <td>

                                <a href="<?= base_url('verifikasi_surat/detail/'.$p['id']); ?>"
                                   class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>

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