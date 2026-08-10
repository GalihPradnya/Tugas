<h1 class="h3 mb-4 text-gray-800">
    Detail Surat
</h1>

<?= $this->session->flashdata('message'); ?>


<!-- ================================================= -->
<!-- INFORMASI SURAT -->
<!-- ================================================= -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Informasi Surat
        </h6>

    </div>


    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <tr>

                    <th width="25%">
                        Nomor Surat
                    </th>

                    <td>
                        <?= !empty($surat['nomor_surat'])
                            ? html_escape($surat['nomor_surat'])
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Tanggal Surat
                    </th>

                    <td>

                        <?php if (!empty($surat['tanggal_surat'])): ?>

                            <?= date(
                                'd-m-Y',
                                strtotime($surat['tanggal_surat'])
                            ); ?>

                        <?php else: ?>

                            -

                        <?php endif; ?>

                    </td>

                </tr>


                <tr>

                    <th>
                        Jenis Surat
                    </th>

                    <td>

                        <strong>

                            <?= !empty($pengajuan['nama_surat'])
                                ? html_escape($pengajuan['nama_surat'])
                                : '-';
                            ?>

                        </strong>

                    </td>

                </tr>


                <tr>

                    <th>
                        Dibuat Oleh
                    </th>

                    <td>

                        <?= !empty($surat['dibuat_oleh'])
                            ? html_escape($surat['dibuat_oleh'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <tr>

                    <th>
                        Dibuat Pada
                    </th>

                    <td>

                        <?php if (!empty($surat['created_at'])): ?>

                            <?= date(
                                'd-m-Y H:i',
                                strtotime($surat['created_at'])
                            ); ?>

                        <?php else: ?>

                            -

                        <?php endif; ?>

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- DATA PEMOHON -->
<!-- ================================================= -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Data Pemohon
        </h6>

    </div>


    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">


                <!-- NAMA -->

                <tr>

                    <th width="25%">
                        Nama Lengkap
                    </th>

                    <td>

                        <?= !empty($pengajuan['nama_lengkap'])
                            ? html_escape($pengajuan['nama_lengkap'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- NIK -->

                <tr>

                    <th>
                        NIK
                    </th>

                    <td>

                        <?= !empty($pengajuan['nik'])
                            ? html_escape($pengajuan['nik'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- TEMPAT LAHIR -->

                <tr>

                    <th>
                        Tempat Lahir
                    </th>

                    <td>

                        <?= !empty($pengajuan['tempat_lahir'])
                            ? html_escape($pengajuan['tempat_lahir'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- TANGGAL LAHIR -->

                <tr>

                    <th>
                        Tanggal Lahir
                    </th>

                    <td>

                        <?php if (!empty($pengajuan['tanggal_lahir'])): ?>

                            <?= date(
                                'd-m-Y',
                                strtotime($pengajuan['tanggal_lahir'])
                            ); ?>

                        <?php else: ?>

                            -

                        <?php endif; ?>

                    </td>

                </tr>


                <!-- JENIS KELAMIN -->

                <tr>

                    <th>
                        Jenis Kelamin
                    </th>

                    <td>

                        <?php

                        if (
                            isset($pengajuan['jenis_kelamin'])
                            && $pengajuan['jenis_kelamin'] === 'L'
                        ) {

                            echo 'Laki-laki';

                        } elseif (
                            isset($pengajuan['jenis_kelamin'])
                            && $pengajuan['jenis_kelamin'] === 'P'
                        ) {

                            echo 'Perempuan';

                        } elseif (
                            !empty($pengajuan['jenis_kelamin'])
                        ) {

                            echo html_escape(
                                $pengajuan['jenis_kelamin']
                            );

                        } else {

                            echo '-';

                        }

                        ?>

                    </td>

                </tr>


                <!-- ALAMAT -->

                <tr>

                    <th>
                        Alamat
                    </th>

                    <td>

                        <?= !empty($pengajuan['alamat'])
                            ? html_escape($pengajuan['alamat'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- RT -->

                <tr>

                    <th>
                        RT
                    </th>

                    <td>

                        <?= !empty($pengajuan['rt'])
                            ? html_escape($pengajuan['rt'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- RW -->

                <tr>

                    <th>
                        RW
                    </th>

                    <td>

                        <?= !empty($pengajuan['rw'])
                            ? html_escape($pengajuan['rw'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- AGAMA -->

                <tr>

                    <th>
                        Agama
                    </th>

                    <td>

                        <?= !empty($pengajuan['agama'])
                            ? html_escape($pengajuan['agama'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- PEKERJAAN -->

                <tr>

                    <th>
                        Pekerjaan
                    </th>

                    <td>

                        <?= !empty($pengajuan['pekerjaan'])
                            ? html_escape($pengajuan['pekerjaan'])
                            : '-';
                        ?>

                    </td>

                </tr>


                <!-- STATUS PERKAWINAN -->

                <tr>

                    <th>
                        Status Perkawinan
                    </th>

                    <td>

                        <?= !empty($pengajuan['status_perkawinan'])
                            ? html_escape($pengajuan['status_perkawinan'])
                            : '-';
                        ?>

                    </td>

                </tr>


            </table>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- DATA ISI SURAT -->
<!-- ================================================= -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Data Isi Surat
        </h6>

    </div>


    <div class="card-body">

        <?php if (!empty($detail)): ?>

            <div class="table-responsive">

                <table class="table table-bordered">


                    <thead class="thead-light">

                        <tr>

                            <th width="5%">
                                No
                            </th>

                            <th width="30%">
                                Field
                            </th>

                            <th>
                                Isi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>


                        <?php foreach ($detail as $d): ?>

                            <?php

                            /*
                            |--------------------------------------------------------------------------
                            | Buat label dari field_name
                            |--------------------------------------------------------------------------
                            |
                            | contoh:
                            | nama_usaha
                            | menjadi:
                            | Nama Usaha
                            |
                            */

                            $label = ucwords(
                                str_replace(
                                    '_',
                                    ' ',
                                    $d['field_name']
                                )
                            );

                            /*
                            |--------------------------------------------------------------------------
                            | Keterangan usaha tidak perlu ditampilkan
                            |--------------------------------------------------------------------------
                            */

                            if (
                                $d['field_name']
                                === 'keterangan_usaha'
                            ) {
                                continue;
                            }

                            ?>


                            <tr>

                                <td>

                                    <?= $no++; ?>

                                </td>


                                <td>

                                    <strong>

                                        <?= html_escape(
                                            $label
                                        ); ?>

                                    </strong>

                                </td>


                                <td>

                                    <?php if (
                                        !empty(
                                            $d['field_value']
                                        )
                                    ): ?>

                                        <?= nl2br(
                                            html_escape(
                                                $d['field_value']
                                            )
                                        ); ?>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </td>

                            </tr>


                        <?php endforeach; ?>


                    </tbody>

                </table>

            </div>


        <?php else: ?>


            <div class="alert alert-warning">

                Belum ada data isi surat.

            </div>


        <?php endif; ?>

    </div>

</div>



<!-- ================================================= -->
<!-- TOMBOL AKSI -->
<!-- ================================================= -->

<div class="mb-4">


    <!-- CETAK SURAT -->

    <a
        href="<?= base_url(
            'surat/surat_admin/cetak/'
            . $surat['id']
        ); ?>"
        target="_blank"
        class="btn btn-primary">

        <i class="fas fa-print"></i>

        Cetak Surat

    </a>


    <!-- EDIT SURAT -->

    <a
        href="<?= base_url(
            'surat/surat_admin/edit/'
            . $surat['id']
        ); ?>"
        class="btn btn-warning">

        <i class="fas fa-edit"></i>

        Edit Surat

    </a>


    <!-- KEMBALI KE DETAIL PENGAJUAN -->

    <a
        href="<?= base_url(
            'surat/pengajuan_admin/detail/'
            . $surat['pengajuan_id']
        ); ?>"
        class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>

        Kembali

    </a>


</div>