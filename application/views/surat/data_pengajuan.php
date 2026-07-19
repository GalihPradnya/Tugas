<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-12">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Data Pengajuan Surat
                    </h6>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $no = 1; ?>
                                    <?php foreach($pengajuan as $p): ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['nama_surat']; ?></td>
                                        <td>

                                <?php if($p['status'] == 'Menunggu'): ?>

                                    <span class="badge badge-warning">
                                        Menunggu
                                    </span>

                                <?php elseif($p['status'] == 'Diproses'): ?>

                                    <span class="badge badge-primary">
                                        Diproses
                                    </span>

                                <?php elseif($p['status'] == 'Selesai'): ?>

                                    <span class="badge badge-success">
                                        Selesai
                                    </span>

                                <?php elseif($p['status'] == 'Ditolak'): ?>

                                    <span class="badge badge-danger">
                                        Ditolak
                                    </span>

                                <?php endif; ?>

                            </td>
                                        <td>
                                            <a href="<?= base_url('surat/Pengajuan_admin/detail/'.$p['id']); ?>"
                                            class="btn btn-info btn-sm">
                                                Detail
                                            </a>
                                            <a href="<?= base_url('surat/Pengajuan_admin/detail/'.$p['id']); ?>"
                                            class="btn btn-primary btn-sm">
                                                Proses
                                            </a>
                                        </td>
                                    </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
