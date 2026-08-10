<h1 class="h3 mb-4 text-gray-800">
    Edit Surat
</h1>

<?= $this->session->flashdata('message'); ?>


<form action="<?= base_url('surat/surat_admin/update'); ?>"
      method="post">

    <!-- ================================================= -->
    <!-- ID SURAT -->
    <!-- ================================================= -->

    <input
        type="hidden"
        name="surat_id"
        value="<?= html_escape($surat['id']); ?>">


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
                            <?= html_escape(
                                $pengajuan['nama_lengkap']
                            ); ?>
                        </td>

                    </tr>


                    <!-- NIK -->

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


                    <!-- TEMPAT LAHIR -->

                    <tr>

                        <th>
                            Tempat Lahir
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['tempat_lahir']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['tempat_lahir']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- TANGGAL LAHIR -->

                    <tr>

                        <th>
                            Tanggal Lahir
                        </th>

                        <td>

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

                            <?php if (
                                !empty(
                                    $pengajuan['jenis_kelamin']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['jenis_kelamin']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- ALAMAT -->

                    <tr>

                        <th>
                            Alamat
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['alamat']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['alamat']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- RT -->

                    <tr>

                        <th>
                            RT
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['rt']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['rt']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- RW -->

                    <tr>

                        <th>
                            RW
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['rw']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['rw']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- AGAMA -->

                    <tr>

                        <th>
                            Agama
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['agama']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['agama']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- PEKERJAAN -->

                    <tr>

                        <th>
                            Pekerjaan
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['pekerjaan']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['pekerjaan']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- STATUS PERKAWINAN -->

                    <tr>

                        <th>
                            Status Perkawinan
                        </th>

                        <td>

                            <?php if (
                                !empty(
                                    $pengajuan['status_perkawinan']
                                )
                            ): ?>

                                <?= html_escape(
                                    $pengajuan['status_perkawinan']
                                ); ?>

                            <?php else: ?>

                                -

                            <?php endif; ?>

                        </td>

                    </tr>


                    <!-- JENIS SURAT -->

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
    <!-- KHUSUS SURAT KETERANGAN MENINGGAL -->
    <!-- ================================================= -->

    <?php if (
        (int)$pengajuan['jenis_surat_id'] === 3
    ): ?>


        <div class="card shadow mb-4">


            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">

                    Penduduk yang Meninggal

                </h6>

            </div>


            <div class="card-body">


                <!-- ===================================== -->
                <!-- PENCARIAN -->
                <!-- ===================================== -->

                <div class="form-group">

                    <label>
                        Cari Penduduk
                    </label>

                    <input
                        type="text"
                        id="cariPenduduk"
                        class="form-control"
                        placeholder="Ketik NIK atau nama penduduk..."
                        autocomplete="off">

                    <small class="form-text text-muted">

                        Cari berdasarkan NIK atau nama.

                    </small>

                </div>


                <!-- ===================================== -->
                <!-- HASIL PENCARIAN -->
                <!-- ===================================== -->

                <div
                    id="hasilPenduduk"
                    class="list-group mb-3">
                </div>


                <!-- ===================================== -->
                <!-- PENDUDUK TERPILIH -->
                <!-- ===================================== -->

                <input
                    type="hidden"
                    name="penduduk_id"
                    id="penduduk_id"
                    value="<?= !empty(
                        $penduduk_meninggal['id']
                    )
                        ? html_escape(
                            $penduduk_meninggal['id']
                        )
                        : ''; ?>">


                <div
                    id="dataPendudukTerpilih"
                    class="<?= empty(
                        $penduduk_meninggal
                    )
                        ? 'd-none'
                        : ''; ?>">


                    <div class="alert alert-success">


                        <h6 class="font-weight-bold">
                            Penduduk yang Dipilih
                        </h6>


                        <hr>


                        <div class="row">

                            <div class="col-md-6">

                                <strong>
                                    Nama Lengkap
                                </strong>

                                <br>

                                <span id="namaPenduduk">

                                    <?= !empty(
                                        $penduduk_meninggal[
                                            'nama_lengkap'
                                        ]
                                    )
                                        ? html_escape(
                                            $penduduk_meninggal[
                                                'nama_lengkap'
                                            ]
                                        )
                                        : ''; ?>

                                </span>

                            </div>


                            <div class="col-md-6">

                                <strong>
                                    NIK
                                </strong>

                                <br>

                                <span id="nikPenduduk">

                                    <?= !empty(
                                        $penduduk_meninggal[
                                            'nik'
                                        ]
                                    )
                                        ? html_escape(
                                            $penduduk_meninggal[
                                                'nik'
                                            ]
                                        )
                                        : ''; ?>

                                </span>

                            </div>

                        </div>


                        <?php if (
                            !empty(
                                $penduduk_meninggal[
                                    'tempat_lahir'
                                ]
                            )
                        ): ?>

                            <hr>

                            <strong>
                                Tempat Lahir
                            </strong>

                            <br>

                            <?= html_escape(
                                $penduduk_meninggal[
                                    'tempat_lahir'
                                ]
                            ); ?>

                        <?php endif; ?>


                        <?php if (
                            !empty(
                                $penduduk_meninggal[
                                    'tanggal_lahir'
                                ]
                            )
                        ): ?>

                            <br><br>

                            <strong>
                                Tanggal Lahir
                            </strong>

                            <br>

                            <?= date(
                                'd-m-Y',
                                strtotime(
                                    $penduduk_meninggal[
                                        'tanggal_lahir'
                                    ]
                                )
                            ); ?>

                        <?php endif; ?>


                        <?php if (
                            !empty(
                                $penduduk_meninggal[
                                    'alamat'
                                ]
                            )
                        ): ?>

                            <hr>

                            <strong>
                                Alamat
                            </strong>

                            <br>

                            <?= html_escape(
                                $penduduk_meninggal[
                                    'alamat'
                                ]
                            ); ?>

                        <?php endif; ?>


                    </div>

                </div>


                <?php if (
                    empty(
                        $penduduk_meninggal
                    )
                ): ?>

                    <div class="alert alert-warning">

                        <i class="fas fa-exclamation-triangle"></i>

                        Belum ada penduduk yang dipilih.

                    </div>

                <?php endif; ?>


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


            <!-- NOMOR SURAT -->

            <div class="form-group">

                <label>
                    Nomor Surat
                </label>

                <input
                    type="text"
                    name="nomor_surat"
                    class="form-control"
                    value="<?= html_escape(
                        $surat['nomor_surat']
                    ); ?>"
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
                    value="<?= html_escape(
                        $surat['tanggal_surat']
                    ); ?>"
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


            <?php if (
                !empty($field_surat)
            ): ?>


                <?php foreach (
                    $field_surat
                    as $field
                ): ?>


                    <?php

                    $label =
                        !empty(
                            $field['field_label']
                        )

                        ? $field['field_label']

                        : ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $field['field_name']
                            )
                        );


                    $field_type =
                        !empty(
                            $field['field_type']
                        )

                        ? $field['field_type']

                        : 'text';


                    $wajib =
                        !empty(
                            $field['wajib']
                        );


                    $field_name =
                        $field['field_name'];


                    $value =
                        isset(
                            $isi_surat[
                                $field_name
                            ]
                        )

                        ? $isi_surat[
                            $field_name
                        ]

                        : '';

                    ?>


                    <div class="form-group">


                        <label>

                            <?= html_escape(
                                $label
                            ); ?>


                            <?php if (
                                $wajib
                            ): ?>

                                <span class="text-danger">
                                    *
                                </span>

                            <?php endif; ?>

                        </label>



                        <?php if (
                            $field_type === 'textarea'
                        ): ?>


                            <textarea
                                name="<?= html_escape(
                                    $field_name
                                ); ?>"
                                class="form-control"
                                rows="4"
                                <?= $wajib
                                    ? 'required'
                                    : ''; ?>
                                placeholder="Masukkan <?= html_escape(
                                    strtolower(
                                        $label
                                    )
                                ); ?>"><?= html_escape(
                                    $value
                                ); ?></textarea>


                        <?php elseif (
                            $field_type === 'number'
                        ): ?>


                            <input
                                type="number"
                                name="<?= html_escape(
                                    $field_name
                                ); ?>"
                                class="form-control"
                                value="<?= html_escape(
                                    $value
                                ); ?>"
                                <?= $wajib
                                    ? 'required'
                                    : ''; ?>
                                placeholder="Masukkan <?= html_escape(
                                    strtolower(
                                        $label
                                    )
                                ); ?>">


                        <?php elseif (
                            $field_type === 'date'
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
                                <?= $wajib
                                    ? 'required'
                                    : ''; ?>>


                        <?php else: ?>


                            <input
                                type="text"
                                name="<?= html_escape(
                                    $field_name
                                ); ?>"
                                class="form-control"
                                value="<?= html_escape(
                                    $value
                                ); ?>"
                                <?= $wajib
                                    ? 'required'
                                    : ''; ?>
                                placeholder="Masukkan <?= html_escape(
                                    strtolower(
                                        $label
                                    )
                                ); ?>">


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

            Simpan Perubahan

        </button>


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



<!-- ===================================================== -->
<!-- JAVASCRIPT PENCARIAN PENDUDUK -->
<!-- ===================================================== -->

<?php if (
    (int)$pengajuan['jenis_surat_id'] === 3
): ?>

<script>

$(document).ready(function () {

    $('#cariPenduduk').on('keyup', function () {

        let keyword = $(this).val().trim();

        if (keyword.length < 2) {

            $('#hasilPenduduk').html('');

            return;
        }


        $.ajax({

            url: "<?= base_url('surat/surat_admin/cari_penduduk'); ?>",

            type: "POST",

            data: {
                keyword: keyword
            },

            dataType: "json",

            success: function (data) {

                console.log('Hasil penduduk:', data);

                let html = '';


                if (!data || data.length === 0) {

                    html = `
                        <div class="alert alert-warning">
                            <i class="fas fa-search"></i>
                            Penduduk tidak ditemukan.
                        </div>
                    `;

                } else {

                    $.each(data, function (index, penduduk) {

                        html += `

                            <button
                                type="button"
                                class="list-group-item
                                       list-group-item-action
                                       pilihPenduduk"

                                data-id="${penduduk.id}"

                                data-nik="${penduduk.nik}"

                                data-nama="${penduduk.nama_lengkap}">

                                <strong>
                                    ${penduduk.nama_lengkap}
                                </strong>

                                <br>

                                <small>
                                    NIK: ${penduduk.nik}
                                </small>

                            </button>

                        `;

                    });

                }


                $('#hasilPenduduk')
                    .html(html);

            },


            error: function (xhr, status, error) {

                console.log(
                    'AJAX ERROR:',
                    xhr.responseText
                );

                console.log(
                    'STATUS:',
                    status
                );

                console.log(
                    'ERROR:',
                    error
                );


                $('#hasilPenduduk').html(`

                    <div class="alert alert-danger">

                        <i class="fas fa-exclamation-triangle"></i>

                        Terjadi kesalahan saat mencari
                        data penduduk.

                    </div>

                `);

            }

        });

    });



    // =====================================================
    // PILIH PENDUDUK
    // =====================================================

    $(document).on(
        'click',
        '.pilihPenduduk',
        function () {

            let id =
                $(this).attr('data-id');

            let nik =
                $(this).attr('data-nik');

            let nama =
                $(this).attr('data-nama');


            // Masukkan ID ke hidden input

            $('#penduduk_id')
                .val(id);


            // Tampilkan data

            $('#namaPenduduk')
                .text(nama);

            $('#nikPenduduk')
                .text(nik);


            // Tampilkan data terpilih

            $('#dataPendudukTerpilih')
                .removeClass('d-none');


            // Hilangkan hasil pencarian

            $('#hasilPenduduk')
                .html('');


            // Kosongkan pencarian

            $('#cariPenduduk')
                .val('');

        }
    );

});

</script>

<?php endif; ?>