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
                        <th width="25%">Nama Lengkap</th>
                        <td>
                            <?= html_escape($pengajuan['nama_lengkap']); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>NIK</th>
                        <td>
                            <?= html_escape($pengajuan['nik']); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Jenis Surat</th>
                        <td>
                            <strong>
                                <?= html_escape($pengajuan['nama_surat']); ?>
                            </strong>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>


    <!-- ================================================= -->
    <!-- KHUSUS SURAT KETERANGAN MENINGGAL -->
    <!-- ================================================= -->

    <?php if ($pengajuan['jenis_surat_id'] == 3): ?>

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-danger">
                    Data Penduduk yang Meninggal
                </h6>

            </div>


            <div class="card-body">

                <div class="alert alert-info">

                    <i class="fas fa-info-circle"></i>

                    Surat ini diajukan oleh pihak lain.
                    Silakan cari dan pilih penduduk yang meninggal
                    berdasarkan NIK atau nama.

                </div>


                <div class="form-group">

                    <label>
                        Cari NIK / Nama Penduduk
                        <span class="text-danger">*</span>
                    </label>


                    <input
                        type="text"
                        id="cariPenduduk"
                        class="form-control"
                        placeholder="Ketik NIK atau nama penduduk..."
                        autocomplete="off"
                    >

                </div>


                <div
                    id="hasilPencarian"
                    class="list-group mb-3">
                </div>


                <!-- ID PENDUDUK -->

                <input
                    type="hidden"
                    name="penduduk_meninggal_id"
                    id="penduduk_meninggal_id"
                    required
                >


                <!-- DATA TERPILIH -->

                <div
                    id="pendudukTerpilih"
                    class="alert alert-success"
                    style="display:none;">

                    <strong>
                        Penduduk yang meninggal:
                    </strong>

                    <div id="detailPenduduk"></div>

                </div>

            </div>

        </div>

    <?php endif; ?>


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

            <input
                type="hidden"
                name="pengajuan_id"
                value="<?= $pengajuan['id']; ?>"
            >


            <div class="form-group">

                <label>
                    Nomor Surat
                </label>

                <input
                    type="text"
                    name="nomor_surat"
                    class="form-control"
                    placeholder="Masukkan nomor surat"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Tanggal Surat
                </label>

                <input
                    type="date"
                    name="tanggal_surat"
                    class="form-control"
                    value="<?= date('Y-m-d'); ?>"
                    required
                >

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

                    $label =
                        !empty($field['field_label'])
                        ? $field['field_label']
                        : ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $field['field_name']
                            )
                        );


                    $field_type =
                        !empty($field['field_type'])
                        ? $field['field_type']
                        : 'text';


                    $wajib =
                        !empty($field['wajib']);

                    ?>


                    <div class="form-group">

                        <label>

                            <?= html_escape($label); ?>

                            <?php if ($wajib): ?>

                                <span class="text-danger">
                                    *
                                </span>

                            <?php endif; ?>

                        </label>


                        <?php if ($field_type == 'textarea'): ?>

                            <textarea
                                name="<?= html_escape($field['field_name']); ?>"
                                class="form-control"
                                rows="4"
                                <?= $wajib ? 'required' : ''; ?>
                                placeholder="Masukkan <?= html_escape(strtolower($label)); ?>"
                            ></textarea>


                        <?php elseif ($field_type == 'number'): ?>

                            <input
                                type="number"
                                name="<?= html_escape($field['field_name']); ?>"
                                class="form-control"
                                <?= $wajib ? 'required' : ''; ?>
                                placeholder="Masukkan <?= html_escape(strtolower($label)); ?>"
                            >


                        <?php elseif ($field_type == 'date'): ?>

                            <input
                                type="date"
                                name="<?= html_escape($field['field_name']); ?>"
                                class="form-control"
                                <?= $wajib ? 'required' : ''; ?>
                            >


                        <?php else: ?>

                            <input
                                type="text"
                                name="<?= html_escape($field['field_name']); ?>"
                                class="form-control"
                                <?= $wajib ? 'required' : ''; ?>
                                placeholder="Masukkan <?= html_escape(strtolower($label)); ?>"
                            >

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


<!-- ================================================= -->
<!-- JAVASCRIPT PENCARIAN PENDUDUK -->
<!-- ================================================= -->

<?php if ($pengajuan['jenis_surat_id'] == 3): ?>

<script>

$(document).ready(function () {

    let timer = null;


    $('#cariPenduduk').on('keyup', function () {

        let keyword = $(this).val().trim();


        clearTimeout(timer);


        if (keyword.length < 2) {

            $('#hasilPencarian').html('');

            return;
        }


        timer = setTimeout(function () {

            $.ajax({

                url:
                    '<?= base_url(
                        'surat/surat_admin/cari_penduduk_meninggal'
                    ); ?>',

                type: 'GET',

                dataType: 'json',

                data: {
                    keyword: keyword
                },


                success: function (data) {

                    let html = '';


                    if (data.length === 0) {

                        html += `
                            <div class="alert alert-warning">
                                Penduduk tidak ditemukan.
                            </div>
                        `;

                    } else {

                        $.each(data, function (index, penduduk) {

                            html += `

                                <button
                                    type="button"
                                    class="list-group-item list-group-item-action pilih-penduduk"
                                    data-id="${penduduk.id}"
                                    data-nik="${penduduk.nik}"
                                    data-nama="${penduduk.nama_lengkap}"
                                    data-tempat="${penduduk.tempat_lahir ?? ''}"
                                    data-tanggal="${penduduk.tanggal_lahir ?? ''}"
                                    data-jk="${penduduk.jenis_kelamin ?? ''}"
                                    data-alamat="${penduduk.alamat ?? ''}"
                                >

                                    <strong>
                                        ${penduduk.nama_lengkap}
                                    </strong>

                                    <br>

                                    <small>
                                        NIK:
                                        ${penduduk.nik}
                                    </small>

                                </button>

                            `;

                        });

                    }


                    $('#hasilPencarian')
                        .html(html);

                },


                error: function () {

                    $('#hasilPencarian')
                        .html(`
                            <div class="alert alert-danger">
                                Terjadi kesalahan saat mencari data penduduk.
                            </div>
                        `);

                }

            });

        }, 300);

    });


    // ======================================================
    // PILIH PENDUDUK
    // ======================================================

    $(document).on(
        'click',
        '.pilih-penduduk',
        function () {

            let id =
                $(this).data('id');

            let nik =
                $(this).data('nik');

            let nama =
                $(this).data('nama');

            let tempat =
                $(this).data('tempat');

            let tanggal =
                $(this).data('tanggal');

            let jk =
                $(this).data('jk');

            let alamat =
                $(this).data('alamat');


            $('#penduduk_meninggal_id')
                .val(id);


            $('#cariPenduduk')
                .val(
                    nama + ' - ' + nik
                );


            $('#hasilPencarian')
                .html('');


            $('#detailPenduduk')
                .html(`

                    <strong>
                        ${nama}
                    </strong>

                    <br>

                    NIK:
                    ${nik}

                    <br>

                    Tempat/Tanggal Lahir:
                    ${tempat || '-'}
                    /
                    ${tanggal || '-'}

                    <br>

                    Jenis Kelamin:
                    ${jk || '-'}

                    <br>

                    Alamat:
                    ${alamat || '-'}

                `);


            $('#pendudukTerpilih')
                .show();

        }

    );

});

</script>

<?php endif; ?>