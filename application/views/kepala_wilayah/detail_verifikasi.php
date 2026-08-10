<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Verifikasi Pengajuan Surat
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Pemohon
            </h6>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="30%">NIK</th>
                    <td><?= $pengajuan['nik']; ?></td>
                </tr>

                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= $pengajuan['nama_lengkap']; ?></td>
                </tr>

                <tr>
                    <th>Tempat / Tanggal Lahir</th>
                    <td>
                        <?= $pengajuan['tempat_lahir']; ?>,
                        <?= date('d-m-Y', strtotime($pengajuan['tanggal_lahir'])); ?>
                    </td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $pengajuan['jenis_kelamin']; ?></td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>
                        <?= $pengajuan['alamat']; ?>
                        RT <?= $pengajuan['rt']; ?>
                        RW <?= $pengajuan['rw']; ?>
                    </td>
                </tr>

                <tr>
                    <th>Agama</th>
                    <td><?= $pengajuan['agama']; ?></td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td><?= $pengajuan['pekerjaan']; ?></td>
                </tr>

                <tr>
                    <th>Status Perkawinan</th>
                    <td><?= $pengajuan['status_perkawinan']; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?= $pengajuan['email']; ?></td>
                </tr>

            </table>

        </div>

    </div>





    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Pengajuan Surat
            </h6>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="30%">Jenis Surat</th>
                    <td><?= $pengajuan['nama_surat']; ?></td>
                </tr>

                <tr>
                    <th>Keperluan</th>
                    <td><?= $pengajuan['keperluan']; ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <span class="badge badge-warning">
                            <?= $pengajuan['status']; ?>
                        </span>

                    </td>
                </tr>

            </table>

        </div>

    </div>





    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Persyaratan Yang Diunggah
            </h6>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th width="5%">No</th>
                        <th>Persyaratan</th>
                        <th width="20%">File</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no=1; ?>

                    <?php foreach($files as $file): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $file['nama_persyaratan']; ?></td>

                        <td>

                            <a href="<?= base_url('uploads/persyaratan/'.$file['nama_file']); ?>"
                               target="_blank"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-file"></i>
                                Lihat File

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>





    <a href="<?= base_url('verifikasi_surat'); ?>"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        Kembali

    </a>



    <a href="<?= base_url('verifikasi_surat/setujui/'.$pengajuan['id']); ?>"
       class="btn btn-success"
       onclick="return confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')">

        <i class="fas fa-check"></i>
        Setujui

    </a>



    <button class="btn btn-danger"
            data-toggle="modal"
            data-target="#modalTolak">

        <i class="fas fa-times"></i>
        Tolak

    </button>

</div>
<div class="modal fade" id="modalTolak">

    <div class="modal-dialog">

        <form action="<?= base_url('verifikasi_surat/tolak'); ?>" method="post">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Alasan Penolakan
                    </h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">

                        &times;

                    </button>

                </div>

                <div class="modal-body">

                    <input type="hidden"
                           name="id"
                           value="<?= $pengajuan['id']; ?>">

                    <div class="form-group">

                        <label>Alasan Penolakan</label>

                        <textarea
                            name="alasan_penolakan"
                            class="form-control"
                            rows="5"
                            required></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary"
                            data-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit"
                            class="btn btn-danger">

                        Tolak Pengajuan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>