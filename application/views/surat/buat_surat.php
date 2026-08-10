<h1 class="h3 mb-4 text-gray-800">
    Buat Surat
</h1>

<?= $this->session->flashdata('message'); ?>


<form action="<?= base_url('surat/surat_admin/simpan'); ?>"
      method="post">


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

                            <?php if(!empty($pengajuan['tempat_lahir'])): ?>

                                <?= html_escape(
                                    $pengajuan['tempat_lahir']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Tanggal Lahir
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['tanggal_lahir'])): ?>

                                <?= date(
                                    'd-m-Y',
                                    strtotime(
                                        $pengajuan['tanggal_lahir']
                                    )
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Jenis Kelamin
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['jenis_kelamin'])): ?>

                                <?= html_escape(
                                    $pengajuan['jenis_kelamin']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Alamat
                        </th>

                        <td>
                            <?= html_escape(
                                $pengajuan['alamat']
                            ); ?>
                        </td>

                    </tr>


                    <tr>

                        <th>
                            RT
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['rt'])): ?>

                                <?= html_escape(
                                    $pengajuan['rt']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            RW
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['rw'])): ?>

                                <?= html_escape(
                                    $pengajuan['rw']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Agama
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['agama'])): ?>

                                <?= html_escape(
                                    $pengajuan['agama']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Pekerjaan
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['pekerjaan'])): ?>

                                <?= html_escape(
                                    $pengajuan['pekerjaan']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <tr>

                        <th>
                            Status Perkawinan
                        </th>

                        <td>

                            <?php if(!empty($pengajuan['status_perkawinan'])): ?>

                                <?= html_escape(
                                    $pengajuan['status_perkawinan']
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
                                <?= html_escape(
                                    $pengajuan['nama_surat']
                                ); ?>
                            </strong>

                        </td>

                    </tr>


                </table>

            </div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- DATA SURAT -->
    <!-- ================================================= -->

    <div class="card shadow mb-4">


        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Surat
            </h6>

        </div>


        <div class="card-body">


            <!-- PENGAJUAN ID -->

            <input
                type="hidden"
                name="pengajuan_id"
                value="<?= $pengajuan['id']; ?>">



            <!-- NOMOR SURAT -->

            <div class="form-group">

                <label>
                    Nomor Surat
                </label>

                <input
                    type="text"
                    name="nomor_surat"
                    class="form-control"
                    placeholder="Masukkan nomor surat"
                    required>

            </div>



            <!-- TANGGAL SURAT -->

            <div class="form-group">

                <label>
                    Tanggal Surat
                </label>

                <input
                    type="date"
                    name="tanggal_surat"
                    class="form-control"
                    value="<?= date('Y-m-d'); ?>"
                    required>

            </div>


        </div>

    </div>


<!-- ================================================= -->
<!-- DATA TAMBAHAN / ISI SURAT -->
<!-- ================================================= -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Data Isi Surat
        </h6>

    </div>

    <div class="card-body">

        <?php if (!empty($field_surat)): ?>

            <?php foreach ($field_surat as $field): ?>

                <?php
                $label = !empty($field['field_label'])
                    ? $field['field_label']
                    : ucwords(
                        str_replace(
                            '_',
                            ' ',
                            $field['field_name']
                        )
                    );

                $field_type = !empty($field['field_type'])
                    ? $field['field_type']
                    : 'text';

                $wajib = !empty($field['wajib']);
                ?>

                <div class="form-group">

                    <label>
                        <?= html_escape($label); ?>

                        <?php if ($wajib): ?>
                            <span class="text-danger">*</span>
                        <?php endif; ?>
                    </label>


                    <?php if ($field_type == 'textarea'): ?>

                        <textarea
                            name="<?= html_escape($field['field_name']); ?>"
                            class="form-control"
                            rows="4"
                            <?= $wajib ? 'required' : ''; ?>
                            placeholder="Masukkan <?= html_escape(strtolower($label)); ?>"></textarea>

                    <?php else: ?>

                        <input
                            type="text"
                            name="<?= html_escape($field['field_name']); ?>"
                            class="form-control"
                            <?= $wajib ? 'required' : ''; ?>
                            placeholder="Masukkan <?= html_escape(strtolower($label)); ?>">

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="alert alert-warning">
                Belum ada field tambahan
                untuk jenis surat ini.
            </div>

        <?php endif; ?>

    </div>

</div>



    <!-- ================================================= -->
    <!-- TOMBOL -->
    <!-- ================================================= -->

    <div class="mb-4">


        <button
            type="submit"
            class="btn btn-success">

            <i class="fas fa-save"></i>

            Simpan Surat

        </button>



        <a
            href="<?= base_url(
                'surat/pengajuan_admin/detail/'
                .$pengajuan['id']
            ); ?>"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>


    </div>


</form>