<div class="container-fluid">

    <!-- ===================================================== -->
    <!-- JUDUL -->
    <!-- ===================================================== -->

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengajuan Surat
    </h1>


    <!-- FLASH MESSAGE -->

    <?= $this->session->flashdata('message'); ?>


    <!-- ===================================================== -->
    <!-- DATA PEMOHON -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Pemohon
            </h6>

        </div>


        <div class="card-body">

            <div class="row">

                <!-- KIRI -->

                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>
                            <th width="35%">
                                NIK
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['nik']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Nama Lengkap
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['nama_lengkap']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Tempat Lahir
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['tempat_lahir']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Tanggal Lahir
                            </th>

                            <td>
                                :

                                <?php if (
                                    !empty(
                                        $pengajuan['tanggal_lahir']
                                    )
                                ): ?>

                                    <?= date(
                                        'd-m-Y',
                                        strtotime(
                                            $pengajuan['tanggal_lahir']
                                        )
                                    ); ?>

                                <?php endif; ?>

                            </td>
                        </tr>


                        <tr>
                            <th>
                                Jenis Kelamin
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['jenis_kelamin']
                                ); ?>
                            </td>
                        </tr>

                    </table>

                </div>


                <!-- KANAN -->

                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>
                            <th width="35%">
                                Alamat
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['alamat']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                RT
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['rt']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                RW
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['rw']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Agama
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['agama']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Pekerjaan
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['pekerjaan']
                                ); ?>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Status Perkawinan
                            </th>

                            <td>
                                :
                                <?= htmlspecialchars(
                                    $pengajuan['status_perkawinan']
                                ); ?>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- DATA PENGAJUAN -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Pengajuan Surat
            </h6>

        </div>


        <div class="card-body">

            <table class="table table-bordered">

                <tr>

                    <th width="30%">
                        Jenis Surat
                    </th>

                    <td>
                        <?= htmlspecialchars(
                            $pengajuan['nama_surat']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Nomor Pengajuan
                    </th>

                    <td>
                        <?= $pengajuan['id']; ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Nomor HP
                    </th>

                    <td>
                        <?= htmlspecialchars(
                            $pengajuan['hp']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Tanggal Pengajuan
                    </th>

                    <td>

                        <?= date(
                            'd-m-Y H:i',
                            strtotime(
                                $pengajuan['created_at']
                            )
                        ); ?>

                    </td>

                </tr>


                <!-- ================================================= -->
                <!-- FIELD KHUSUS YANG DIISI MASYARAKAT -->
                <!-- ================================================= -->

                <?php if (!empty($field_pengajuan)): ?>

                    <tr>

                        <th colspan="2"
                            class="bg-light text-primary">

                            Data Yang Diajukan Masyarakat

                        </th>

                    </tr>


                    <?php foreach (
                        $field_pengajuan
                        as $field
                    ): ?>

                        <tr>

                            <th>

                                <?= htmlspecialchars(
                                    $field['label']
                                ); ?>

                            </th>


                            <td>

                                <?php if (
                                    $field['tipe']
                                    ==
                                    'textarea'
                                ): ?>

                                    <?= nl2br(
                                        htmlspecialchars(
                                            $field['nilai']
                                        )
                                    ); ?>

                                <?php elseif (
                                    $field['tipe']
                                    ==
                                    'date'
                                ): ?>

                                    <?php if (
                                        !empty(
                                            $field['nilai']
                                        )
                                    ): ?>

                                        <?= date(
                                            'd-m-Y',
                                            strtotime(
                                                $field['nilai']
                                            )
                                        ); ?>

                                    <?php else: ?>

                                        <span class="text-muted">
                                            -
                                        </span>

                                    <?php endif; ?>

                                <?php elseif (
                                    $field['tipe']
                                    ==
                                    'file'
                                ): ?>

                                    <?php if (
                                        !empty(
                                            $field['nilai']
                                        )
                                    ): ?>

                                        <?= htmlspecialchars(
                                            $field['nilai']
                                        ); ?>

                                    <?php else: ?>

                                        <span class="text-muted">
                                            Tidak ada file
                                        </span>

                                    <?php endif; ?>

                                <?php else: ?>

                                    <?= htmlspecialchars(
                                        $field['nilai']
                                    ); ?>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <th>
                            Data Pengajuan
                        </th>

                        <td>

                            <span class="text-muted">
                                Tidak ada data tambahan.
                            </span>

                        </td>

                    </tr>

                <?php endif; ?>


                <!-- ================================================= -->
                <!-- STATUS -->
                <!-- ================================================= -->

                <tr>

                    <th>
                        Status
                    </th>

                    <td>

                        <?php if (
                            $pengajuan['status']
                            ==
                            'Menunggu Verifikasi'
                        ): ?>

                            <span class="badge badge-warning">
                                Menunggu Verifikasi
                            </span>


                        <?php elseif (
                            $pengajuan['status']
                            ==
                            'Diproses Admin'
                        ): ?>

                            <span class="badge badge-primary">
                                Diproses Admin
                            </span>


                        <?php elseif (
                            $pengajuan['status']
                            ==
                            'Selesai'
                        ): ?>

                            <span class="badge badge-success">
                                Selesai
                            </span>


                        <?php elseif (
                            $pengajuan['status']
                            ==
                            'Ditolak'
                        ): ?>

                            <span class="badge badge-danger">
                                Ditolak
                            </span>


                        <?php else: ?>

                            <span class="badge badge-secondary">

                                <?= htmlspecialchars(
                                    $pengajuan['status']
                                ); ?>

                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

            </table>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- ALASAN PENOLAKAN -->
    <!-- ===================================================== -->

    <?php if (
        $pengajuan['status']
        ==
        'Ditolak'
        &&
        !empty(
            $pengajuan['alasan_penolakan']
        )
    ): ?>

        <div class="card shadow mb-4 border-left-danger">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-danger">
                    Alasan Penolakan
                </h6>

            </div>

            <div class="card-body">

                <?= nl2br(
                    htmlspecialchars(
                        $pengajuan['alasan_penolakan']
                    )
                ); ?>

            </div>

        </div>

    <?php endif; ?>


    <!-- ===================================================== -->
    <!-- FILE PERSYARATAN -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                File Persyaratan
            </h6>

        </div>


        <div class="card-body">

            <?php if (!empty($file)): ?>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th width="5%">
                                    No
                                </th>

                                <th>
                                    Persyaratan
                                </th>

                                <th width="20%">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach (
                                $file as $f
                            ): ?>

                                <tr>

                                    <td>
                                        <?= $no++; ?>
                                    </td>

                                    <td>

                                        <?= htmlspecialchars(
                                            $f[
                                                'nama_persyaratan'
                                            ]
                                        ); ?>

                                    </td>

                                    <td>

                                        <a href="<?= base_url(
                                            'surat/Pengajuan_admin/download/'
                                            .$f['id']
                                        ); ?>"
                                           class="btn btn-success btn-sm">

                                            <i class="fas fa-download"></i>

                                            Download

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="alert alert-info">

                    Tidak ada file persyaratan.

                </div>

            <?php endif; ?>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- PROSES PENGAJUAN -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Proses Pengajuan
            </h6>

        </div>


        <div class="card-body">


            <!-- ================================================= -->
            <!-- DIPROSES ADMIN -->
            <!-- ================================================= -->

            <?php if (
                $pengajuan['status']
                ==
                'Diproses Admin'
            ): ?>

                <div class="alert alert-info">

                    <i class="fas fa-info-circle"></i>

                    Pengajuan telah diverifikasi oleh
                    Kepala Wilayah dan sekarang dapat
                    diproses oleh Admin.

                </div>


                <!-- ================================================= -->
                <!-- SURAT -->
                <!-- ================================================= -->

                <?php if (!empty($surat)): ?>

                    <a href="<?= base_url(
                        'surat/surat_admin/edit/'
                        .$surat['id']
                    ); ?>"
                       class="btn btn-warning">

                        <i class="fas fa-edit"></i>

                        Edit Surat

                    </a>


                    <a href="<?= base_url(
                        'surat/surat_admin/cetak/'
                        .$surat['id']
                    ); ?>"
                       target="_blank"
                       class="btn btn-primary">

                        <i class="fas fa-print"></i>

                        Cetak Surat

                    </a>

                <?php else: ?>

                    <a href="<?= base_url(
                        'surat/surat_admin/buat/'
                        .$pengajuan['id']
                    ); ?>"
                       class="btn btn-primary">

                        <i class="fas fa-file-alt"></i>

                        Buat Surat

                    </a>

                <?php endif; ?>


                <hr>


                <!-- ================================================= -->
                <!-- UPLOAD SURAT HASIL -->
                <!-- ================================================= -->

                <h6 class="font-weight-bold text-gray-800 mb-3">

                    Upload Surat Bertanda Tangan

                </h6>


                <p class="text-muted">

                    Setelah surat dibuat dan dicetak,
                    silakan minta tanda tangan basah
                    Kepala Desa. Kemudian scan surat
                    tersebut menjadi PDF dan upload
                    melalui form berikut.

                </p>


                <form action="<?= base_url(
                    'surat/Pengajuan_admin/updateStatus'
                ); ?>"
                      method="post"
                      enctype="multipart/form-data">


                    <input type="hidden"
                           name="id"
                           value="<?= $pengajuan['id']; ?>">


                    <input type="hidden"
                           name="status"
                           value="Selesai">


                    <div class="form-group">

                        <label>
                            Surat Hasil
                        </label>

                        <input type="file"
                               name="file_hasil"
                               class="form-control"
                               accept=".pdf"
                               required>

                        <small class="form-text text-muted">

                            Format PDF, maksimal 4 MB.

                        </small>

                    </div>


                    <button type="submit"
                            class="btn btn-success"
                            onclick="return confirm(
                                'Upload surat dan ubah status menjadi Selesai?'
                            );">

                        <i class="fas fa-upload"></i>

                        Upload & Selesaikan

                    </button>

                </form>


            <!-- ================================================= -->
            <!-- SELESAI -->
            <!-- ================================================= -->

            <?php elseif (
                $pengajuan['status']
                ==
                'Selesai'
            ): ?>

                <div class="alert alert-success">

                    <i class="fas fa-check-circle"></i>

                    Surat telah selesai diproses.

                </div>


                <?php if (
                    !empty(
                        $pengajuan['file_hasil']
                    )
                ): ?>

                    <a href="<?= base_url(
                        'surat/Pengajuan_admin/download_hasil/'
                        .$pengajuan['id']
                    ); ?>"
                       class="btn btn-success"
                       target="_blank">

                        <i class="fas fa-file-pdf"></i>

                        Lihat Surat

                    </a>

                <?php else: ?>

                    <div class="alert alert-warning">

                        File surat hasil belum tersedia.

                    </div>

                <?php endif; ?>


            <!-- ================================================= -->
            <!-- DITOLAK -->
            <!-- ================================================= -->

            <?php elseif (
                $pengajuan['status']
                ==
                'Ditolak'
            ): ?>

                <div class="alert alert-danger">

                    <i class="fas fa-times-circle"></i>

                    Pengajuan ini telah ditolak oleh
                    Kepala Wilayah.

                </div>


            <!-- ================================================= -->
            <!-- MENUNGGU -->
            <!-- ================================================= -->

            <?php elseif (
                $pengajuan['status']
                ==
                'Menunggu Verifikasi'
            ): ?>

                <div class="alert alert-warning">

                    <i class="fas fa-clock"></i>

                    Pengajuan masih menunggu verifikasi
                    Kepala Wilayah.

                </div>

            <?php endif; ?>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- KEMBALI -->
    <!-- ===================================================== -->

    <a href="<?= base_url(
        'surat/Pengajuan_admin/pengajuan_admin'
    ); ?>"
       class="btn btn-secondary mb-4">

        <i class="fas fa-arrow-left"></i>

        Kembali

    </a>

</div>