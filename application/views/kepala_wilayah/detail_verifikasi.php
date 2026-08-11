<div class="container-fluid">

    <!-- ===================================================== -->
    <!-- JUDUL -->
    <!-- ===================================================== -->

    <h1 class="h3 mb-4 text-gray-800">
        Detail Verifikasi Pengajuan Surat
    </h1>


    <!-- ===================================================== -->
    <!-- FLASH MESSAGE -->
    <!-- ===================================================== -->

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

            <table class="table table-bordered">

                <tr>

                    <th width="30%">
                        NIK
                    </th>

                    <td>
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
                        <?= htmlspecialchars(
                            $pengajuan['nama_lengkap']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Tempat / Tanggal Lahir
                    </th>

                    <td>

                        <?= htmlspecialchars(
                            $pengajuan['tempat_lahir']
                        ); ?>,

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
                        <?= htmlspecialchars(
                            $pengajuan['jenis_kelamin']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Alamat
                    </th>

                    <td>

                        <?= htmlspecialchars(
                            $pengajuan['alamat']
                        ); ?>

                        RT
                        <?= htmlspecialchars(
                            $pengajuan['rt']
                        ); ?>

                        RW
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
                        <?= htmlspecialchars(
                            $pengajuan['status_perkawinan']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Email
                    </th>

                    <td>

                        <?php if (
                            !empty(
                                $pengajuan['email']
                            )
                        ): ?>

                            <?= htmlspecialchars(
                                $pengajuan['email']
                            ); ?>

                        <?php else: ?>

                            <span class="text-muted">
                                Tidak ada email
                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

            </table>

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

                        <?= htmlspecialchars(
                            $pengajuan['id']
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
    <!-- DATA TAMBAHAN DARI PENGAJUAN_FIELD -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Yang Diajukan Masyarakat
            </h6>

        </div>


        <div class="card-body">

            <?php if (!empty($fields)): ?>

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th width="5%">
                                No
                            </th>

                            <th width="35%">
                                Data
                            </th>

                            <th>
                                Nilai
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>


                        <?php foreach (
                            $fields
                            as $field
                        ): ?>

                            <tr>

                                <td>
                                    <?= $no++; ?>
                                </td>


                                <td>

                                    <?= htmlspecialchars(
                                        $field['label']
                                    ); ?>

                                </td>


                                <td>

                                    <?php
                                    $nilai =
                                        $field['nilai'];
                                    ?>


                                    <?php if (
                                        $field['tipe']
                                        ==
                                        'textarea'
                                    ): ?>

                                        <?= nl2br(
                                            htmlspecialchars(
                                                $nilai
                                            )
                                        ); ?>

                                    <?php elseif (
                                        $field['tipe']
                                        ==
                                        'date'
                                    ): ?>

                                        <?php if (
                                            !empty($nilai)
                                        ): ?>

                                            <?= date(
                                                'd-m-Y',
                                                strtotime($nilai)
                                            ); ?>

                                        <?php endif; ?>

                                    <?php else: ?>

                                        <?= nl2br(
                                            htmlspecialchars(
                                                $nilai
                                            )
                                        ); ?>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            <?php else: ?>

                <div class="alert alert-info">

                    Tidak ada data tambahan
                    yang diisi masyarakat.

                </div>

            <?php endif; ?>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- FILE PERSYARATAN -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Persyaratan Yang Diunggah
            </h6>

        </div>


        <div class="card-body">

            <?php if (!empty($files)): ?>

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
                                    File
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>


                            <?php foreach (
                                $files
                                as $file
                            ): ?>

                                <tr>

                                    <td>
                                        <?= $no++; ?>
                                    </td>


                                    <td>

                                        <?= htmlspecialchars(
                                            $file[
                                                'nama_persyaratan'
                                            ]
                                        ); ?>

                                    </td>


                                    <td>

                                        <a
                                            href="<?= base_url(
                                                'uploads/persyaratan/'
                                                .$file['nama_file']
                                            ); ?>"
                                            target="_blank"
                                            class="btn btn-info btn-sm"
                                        >

                                            <i class="fas fa-file"></i>

                                            Lihat File

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="alert alert-warning">

                    Tidak ada file persyaratan
                    yang diunggah.

                </div>

            <?php endif; ?>

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
                        $pengajuan[
                            'alasan_penolakan'
                        ]
                    )
                ); ?>

            </div>

        </div>

    <?php endif; ?>


    <!-- ===================================================== -->
    <!-- TOMBOL AKSI -->
    <!-- ===================================================== -->

    <div class="mb-4">

        <a
            href="<?= base_url(
                'verifikasi_surat'
            ); ?>"
            class="btn btn-secondary"
        >

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>


        <?php if (
            $pengajuan['status']
            ==
            'Menunggu Verifikasi'
        ): ?>

            <a
                href="<?= base_url(
                    'verifikasi_surat/setujui/'
                    .$pengajuan['id']
                ); ?>"
                class="btn btn-success"
                onclick="return confirm(
                    'Apakah Anda yakin ingin menyetujui pengajuan ini?'
                )"
            >

                <i class="fas fa-check"></i>

                Setujui

            </a>


            <button
                class="btn btn-danger"
                data-toggle="modal"
                data-target="#modalTolak"
            >

                <i class="fas fa-times"></i>

                Tolak

            </button>

        <?php endif; ?>

    </div>

</div>


<!-- ========================================================= -->
<!-- MODAL TOLAK -->
<!-- ========================================================= -->

<div
    class="modal fade"
    id="modalTolak"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>

    <div
        class="modal-dialog"
        role="document"
    >

        <form
            action="<?= base_url(
                'verifikasi_surat/tolak'
            ); ?>"
            method="post"
        >

            <div class="modal-content">


                <div class="modal-header">

                    <h5 class="modal-title">

                        Alasan Penolakan

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>
                            &times;
                        </span>

                    </button>

                </div>


                <div class="modal-body">


                    <input
                        type="hidden"
                        name="id"
                        value="<?= $pengajuan['id']; ?>"
                    >


                    <div class="form-group">

                        <label>
                            Alasan Penolakan
                        </label>


                        <textarea
                            name="alasan_penolakan"
                            class="form-control"
                            rows="5"
                            required
                        ></textarea>

                    </div>

                </div>


                <div class="modal-footer">


                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn btn-danger"
                    >

                        <i class="fas fa-times"></i>

                        Tolak Pengajuan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>