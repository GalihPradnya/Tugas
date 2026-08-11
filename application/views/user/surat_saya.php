<div class="container-fluid">

    <!-- ===================================================== -->
    <!-- PAGE HEADING -->
    <!-- ===================================================== -->

    <h1 class="h3 mb-4 text-gray-800">
        Surat Saya
    </h1>


    <!-- ===================================================== -->
    <!-- FLASH MESSAGE -->
    <!-- ===================================================== -->

    <?= $this->session->flashdata('message'); ?>


    <!-- ===================================================== -->
    <!-- KETERANGAN STATUS -->
    <!-- ===================================================== -->

    <div class="alert alert-info">

        <strong>
            <i class="fas fa-info-circle"></i>
            Keterangan Status:
        </strong>

        <br><br>

        <!-- MENUNGGU -->
        <span class="badge badge-warning">
            <i class="fas fa-clock"></i>
            Menunggu Verifikasi
        </span>

        = Menunggu persetujuan Kepala Wilayah.

        <br>

        <!-- DIPROSES ADMIN -->
        <span class="badge badge-primary">
            <i class="fas fa-spinner"></i>
            Diproses Admin
        </span>

        = Pengajuan telah disetujui Kepala Wilayah
        dan sedang diproses oleh Admin.

        <br>

        <!-- SELESAI -->
        <span class="badge badge-success">
            <i class="fas fa-check"></i>
            Selesai
        </span>

        = Surat telah selesai dan dapat diunduh.

        <br>

        <!-- DITOLAK -->
        <span class="badge badge-danger">
            <i class="fas fa-times"></i>
            Ditolak
        </span>

        = Pengajuan tidak dapat diproses.

        <br>

        <!-- DIBATALKAN -->
        <span class="badge badge-secondary">
            <i class="fas fa-ban"></i>
            Dibatalkan
        </span>

        = Pengajuan dibatalkan oleh pemohon.

    </div>


    <!-- ===================================================== -->
    <!-- CARD DAFTAR PENGAJUAN -->
    <!-- ===================================================== -->

    <div class="card shadow mb-4">


        <!-- CARD HEADER -->
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">

                <i class="fas fa-envelope"></i>

                Daftar Pengajuan Surat

            </h6>

        </div>


        <!-- CARD BODY -->
        <div class="card-body">


            <div class="table-responsive">


                <table
                    class="table table-bordered table-hover"
                    width="100%"
                    cellspacing="0"
                >


                    <!-- ================================================= -->
                    <!-- TABLE HEADER -->
                    <!-- ================================================= -->

                    <thead class="thead-light">

                        <tr>

                            <th width="5%">
                                No
                            </th>

                            <th>
                                Jenis Surat
                            </th>

                            <th width="20%">
                                Status
                            </th>

                            <th width="18%">
                                Tanggal Pengajuan
                            </th>

                            <th width="27%">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <!-- ================================================= -->
                    <!-- TABLE BODY -->
                    <!-- ================================================= -->

                    <tbody>


                        <?php if (!empty($surat)): ?>


                            <?php $no = 1; ?>


                            <?php foreach ($surat as $s): ?>


                                <tr>


                                    <!-- ================================= -->
                                    <!-- NOMOR -->
                                    <!-- ================================= -->

                                    <td>

                                        <?= $no++; ?>

                                    </td>


                                    <!-- ================================= -->
                                    <!-- JENIS SURAT -->
                                    <!-- ================================= -->

                                    <td>

                                        <strong>

                                            <?= htmlspecialchars(
                                                $s['nama_surat'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ); ?>

                                        </strong>

                                    </td>


                                    <!-- ================================= -->
                                    <!-- STATUS -->
                                    <!-- ================================= -->

                                    <td>


                                        <!-- ============================= -->
                                        <!-- MENUNGGU VERIFIKASI -->
                                        <!-- ============================= -->

                                        <?php if (
                                            $s['status']
                                            ==
                                            'Menunggu Verifikasi'
                                        ): ?>


                                            <span
                                                class="badge badge-warning"
                                            >

                                                <i
                                                    class="fas fa-clock"
                                                ></i>

                                                Menunggu Verifikasi

                                            </span>


                                        <!-- ============================= -->
                                        <!-- DIPROSES ADMIN -->
                                        <!-- ============================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Diproses Admin'
                                        ): ?>


                                            <span
                                                class="badge badge-primary"
                                            >

                                                <i
                                                    class="fas fa-spinner"
                                                ></i>

                                                Diproses Admin

                                            </span>


                                        <!-- ============================= -->
                                        <!-- SELESAI -->
                                        <!-- ============================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Selesai'
                                        ): ?>


                                            <span
                                                class="badge badge-success"
                                            >

                                                <i
                                                    class="fas fa-check"
                                                ></i>

                                                Selesai

                                            </span>


                                        <!-- ============================= -->
                                        <!-- DITOLAK -->
                                        <!-- ============================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Ditolak'
                                        ): ?>


                                            <span
                                                class="badge badge-danger"
                                            >

                                                <i
                                                    class="fas fa-times"
                                                ></i>

                                                Ditolak

                                            </span>


                                            <!-- ALASAN PENOLAKAN -->

                                            <?php if (
                                                !empty(
                                                    $s[
                                                        'alasan_penolakan'
                                                    ]
                                                )
                                            ): ?>


                                                <div
                                                    class="mt-2"
                                                >

                                                    <small
                                                        class="text-danger"
                                                    >

                                                        <strong>

                                                            Alasan Penolakan:

                                                        </strong>

                                                        <br>

                                                        <?= nl2br(
                                                            htmlspecialchars(
                                                                $s[
                                                                    'alasan_penolakan'
                                                                ],
                                                                ENT_QUOTES,
                                                                'UTF-8'
                                                            )
                                                        ); ?>

                                                    </small>

                                                </div>


                                            <?php endif; ?>


                                        <!-- ============================= -->
                                        <!-- DIBATALKAN -->
                                        <!-- ============================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Dibatalkan'
                                        ): ?>


                                            <span
                                                class="badge badge-secondary"
                                            >

                                                <i
                                                    class="fas fa-ban"
                                                ></i>

                                                Dibatalkan

                                            </span>


                                        <!-- ============================= -->
                                        <!-- STATUS LAIN -->
                                        <!-- ============================= -->

                                        <?php else: ?>


                                            <span
                                                class="badge badge-secondary"
                                            >

                                                <?= htmlspecialchars(
                                                    $s['status'],
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                ); ?>

                                            </span>


                                        <?php endif; ?>


                                    </td>


                                    <!-- ================================= -->
                                    <!-- TANGGAL PENGAJUAN -->
                                    <!-- ================================= -->

                                    <td>


                                        <?php

                                        if (
                                            !empty(
                                                $s['created_at']
                                            )
                                        ) {

                                            echo date(
                                                'd-m-Y H:i',
                                                strtotime(
                                                    $s['created_at']
                                                )
                                            );

                                        } else {

                                            echo '-';

                                        }

                                        ?>


                                    </td>


                                    <!-- ================================= -->
                                    <!-- AKSI -->
                                    <!-- ================================= -->

                                    <td>


                                        <!-- ================================= -->
                                        <!-- SELESAI - DOWNLOAD -->
                                        <!-- ================================= -->

                                        <?php if (
                                            $s['status']
                                            ==
                                            'Selesai'
                                            &&
                                            !empty(
                                                $s['file_hasil']
                                            )
                                        ): ?>


                                            <a
                                                href="<?= base_url(
                                                    'uploads/hasil_surat/'
                                                    .
                                                    $s[
                                                        'file_hasil'
                                                    ]
                                                ); ?>"
                                                target="_blank"
                                                class="btn btn-success btn-sm"
                                            >

                                                <i
                                                    class="fas fa-download"
                                                ></i>

                                                Download Surat

                                            </a>


                                        <!-- ================================= -->
                                        <!-- MENUNGGU VERIFIKASI -->
                                        <!-- ================================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Menunggu Verifikasi'
                                        ): ?>


                                            <div>

                                                <span
                                                    class="text-warning d-block mb-2"
                                                >

                                                    <i
                                                        class="fas fa-clock"
                                                    ></i>

                                                    Menunggu verifikasi
                                                    Kepala Wilayah

                                                </span>


                                                <!-- TOMBOL BATALKAN -->

                                                <a
                                                    href="<?= base_url(
                                                        'user/surat_saya/batalkan/'
                                                        .
                                                        $s['id']
                                                    ); ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm(
                                                        'Apakah Anda yakin ingin membatalkan pengajuan surat ini?'
                                                    );"
                                                >

                                                    <i
                                                        class="fas fa-times"
                                                    ></i>

                                                    Batalkan Pengajuan

                                                </a>

                                            </div>


                                        <!-- ================================= -->
                                        <!-- DIPROSES ADMIN -->
                                        <!-- ================================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Diproses Admin'
                                        ): ?>


                                            <span
                                                class="text-primary"
                                            >

                                                <i
                                                    class="fas fa-spinner"
                                                ></i>

                                                Sedang diproses Admin

                                            </span>


                                        <!-- ================================= -->
                                        <!-- DITOLAK -->
                                        <!-- ================================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Ditolak'
                                        ): ?>


                                            <span
                                                class="text-danger"
                                            >

                                                <i
                                                    class="fas fa-times-circle"
                                                ></i>

                                                Pengajuan ditolak

                                            </span>


                                        <!-- ================================= -->
                                        <!-- DIBATALKAN -->
                                        <!-- ================================= -->

                                        <?php elseif (
                                            $s['status']
                                            ==
                                            'Dibatalkan'
                                        ): ?>


                                            <span
                                                class="text-secondary"
                                            >

                                                <i
                                                    class="fas fa-ban"
                                                ></i>

                                                Pengajuan dibatalkan

                                            </span>


                                        <!-- ================================= -->
                                        <!-- STATUS LAIN -->
                                        <!-- ================================= -->

                                        <?php else: ?>


                                            <span
                                                class="text-muted"
                                            >

                                                -

                                            </span>


                                        <?php endif; ?>


                                    </td>


                                </tr>


                            <?php endforeach; ?>


                        <!-- ================================================= -->
                        <!-- BELUM ADA DATA -->
                        <!-- ================================================= -->

                        <?php else: ?>


                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center"
                                >


                                    <div
                                        class="py-5"
                                    >


                                        <i
                                            class="fas fa-envelope-open-text fa-3x text-gray-400 mb-3"
                                        ></i>


                                        <br>


                                        <span
                                            class="text-muted"
                                        >

                                            Belum ada pengajuan surat.

                                        </span>


                                    </div>


                                </td>

                            </tr>


                        <?php endif; ?>


                    </tbody>


                </table>


            </div>


        </div>

    </div>

</div>