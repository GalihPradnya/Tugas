<h1 class="h3 mb-4 text-gray-800">
    Edit Surat
</h1>

<?= $this->session->flashdata('message'); ?>


<form
    action="<?= base_url('surat/surat_admin/update'); ?>"
    method="post"
>


    <!-- ================================================= -->
    <!-- ID SURAT -->
    <!-- ================================================= -->

    <input
        type="hidden"
        name="surat_id"
        value="<?= $surat['id']; ?>"
    >


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


            <!-- NOMOR SURAT -->

            <div class="form-group">

                <label>
                    Nomor Surat
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="nomor_surat"
                    class="form-control"
                    value="<?= html_escape(
                        $surat['nomor_surat']
                    ); ?>"
                    required
                >

            </div>


            <!-- TANGGAL SURAT -->

            <div class="form-group">

                <label>
                    Tanggal Surat
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="tanggal_surat"
                    class="form-control"
                    value="<?= html_escape(
                        $surat['tanggal_surat']
                    ); ?>"
                    required
                >

            </div>


            <!-- JENIS SURAT -->

            <div class="form-group">

                <label>
                    Jenis Surat
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="<?= html_escape(
                        $pengajuan['nama_surat']
                    ); ?>"
                    readonly
                >

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

            <table class="table table-bordered">

                <tr>

                    <th width="25%">
                        Nama Lengkap
                    </th>

                    <td>
                        <?= html_escape(
                            $pengajuan['nama_lengkap']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        NIK
                    </th>

                    <td>
                        <?= html_escape(
                            $pengajuan['nik']
                        ); ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Tempat Lahir
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['tempat_lahir']
                        )
                            ? html_escape(
                                $pengajuan['tempat_lahir']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Tanggal Lahir
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['tanggal_lahir']
                        )
                            ? date(
                                'd-m-Y',
                                strtotime(
                                    $pengajuan['tanggal_lahir']
                                )
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Jenis Kelamin
                    </th>

                    <td>

                        <?php

                        $jk =
                            $pengajuan['jenis_kelamin']
                            ?? '';

                        if ($jk === 'L') {

                            echo 'Laki-laki';

                        } elseif ($jk === 'P') {

                            echo 'Perempuan';

                        } else {

                            echo '-';

                        }

                        ?>

                    </td>

                </tr>


                <tr>

                    <th>
                        Alamat
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['alamat']
                        )
                            ? html_escape(
                                $pengajuan['alamat']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        RT
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['rt']
                        )
                            ? html_escape(
                                $pengajuan['rt']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        RW
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['rw']
                        )
                            ? html_escape(
                                $pengajuan['rw']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Agama
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['agama']
                        )
                            ? html_escape(
                                $pengajuan['agama']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Pekerjaan
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['pekerjaan']
                        )
                            ? html_escape(
                                $pengajuan['pekerjaan']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>


                <tr>

                    <th>
                        Status Perkawinan
                    </th>

                    <td>
                        <?= !empty(
                            $pengajuan['status_perkawinan']
                        )
                            ? html_escape(
                                $pengajuan['status_perkawinan']
                            )
                            : '-';
                        ?>
                    </td>

                </tr>

            </table>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- ISI SURAT -->
    <!-- ================================================= -->

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Isi Surat
            </h6>

        </div>


        <div class="card-body">


            <?php if (!empty($field_surat)): ?>


                <?php foreach (
                    $field_surat
                    as $field
                ): ?>


                    <?php

                    $field_name =
                        $field['field_name'];


                    // KETERANGAN USAHA TIDAK DIGUNAKAN

                    if (
                        $field_name ===
                        'keterangan_usaha'
                    ) {
                        continue;
                    }


                    // LABEL

                    if (
                        isset(
                            $field['field_label']
                        )
                        &&
                        $field['field_label']
                        !== ''
                    ) {

                        $label =
                            $field['field_label'];

                    } else {

                        $label =
                            ucwords(
                                str_replace(
                                    '_',
                                    ' ',
                                    $field_name
                                )
                            );
                    }


                    // NILAI LAMA

                    $value =
                        $isi_surat[
                            $field_name
                        ]
                        ?? '';

                    ?>


                    <div class="form-group">


                        <label>

                            <?= html_escape(
                                $label
                            ); ?>

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <?php

                        $field_type =
                            $field['field_type']
                            ?? 'textarea';

                        ?>


                        <?php if (
                            $field_type ===
                            'text'
                        ): ?>


                            <input
                                type="text"
                                name="<?= html_escape(
                                    $field_name
                                ); ?>"
                                class="form-control"
                                value="<?= html_escape(
                                    $value
                                ); ?>"
                                required
                            >


                        <?php elseif (
                            $field_type ===
                            'date'
                        ): ?>


                            <input
                                type="date"
                                name="<?= html_escape(
                                    $field_name
                                ); ?>"
                                class="form-control"
                                value="<?= html_escape(
                                    $value
                                ); ?>"
                                required
                            >


                        <?php else: ?>


                            <textarea
                                name="<?= html_escape(
                                    $field_name
                                ); ?>"
                                class="form-control"
                                rows="4"
                                required
                            ><?= html_escape(
                                $value
                            ); ?></textarea>


                        <?php endif; ?>


                    </div>


                <?php endforeach; ?>


            <?php else: ?>


                <div class="alert alert-warning">

                    Belum ada field isi surat.

                </div>


            <?php endif; ?>


        </div>

    </div>



<!-- ================================================= -->
<!-- TOMBOL -->
<!-- ================================================= -->

<div class="mb-4">


    <!-- SIMPAN PERUBAHAN -->

    <button
        type="submit"
        class="btn btn-success">

        <i class="fas fa-save"></i>

        Simpan Perubahan

    </button>


    <!-- LIHAT / CETAK -->

    <a
        href="<?= base_url(
            'surat/surat_admin/cetak/'
            .$surat['id']
        ); ?>"
        target="_blank"
        class="btn btn-primary">

        <i class="fas fa-print"></i>

        Lihat/Cetak Surat

    </a>


    <!-- KEMBALI KE DETAIL SURAT -->

    <a
        href="<?= base_url(
            'surat/surat_admin/detail/'
            .$surat['id']
        ); ?>"
        class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>

        Kembali

    </a>


</div>

</form>