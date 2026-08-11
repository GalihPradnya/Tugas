<main class="container mx-auto py-12 px-4">

<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8 md:p-10">


<!-- =====================================================
     JUDUL
====================================================== -->

<h2 class="text-3xl font-bold text-center text-green-700 mb-2">

    Form Pengajuan Surat

</h2>


<p class="text-center text-gray-500 mb-8">

    Silakan isi formulir berikut dengan benar.

</p>



<!-- =====================================================
     ALERT SUCCESS
====================================================== -->

<?php if ($this->session->flashdata('success')): ?>

<div id="alert-success"
     class="bg-green-100 text-green-700 p-4 rounded mb-5
            flex justify-between items-center">

    <span>

        <?= $this->session->flashdata('success'); ?>

    </span>


    <button
        type="button"
        onclick="closeAlert('alert-success')"
        class="text-green-700 font-bold text-3xl
               hover:text-green-900
               w-10 h-10 flex items-center
               justify-center rounded-full
               hover:bg-green-200">

        &times;

    </button>

</div>

<?php endif; ?>



<!-- =====================================================
     ALERT ERROR
====================================================== -->

<?php if ($this->session->flashdata('error')): ?>

<div id="alert-error"
     class="bg-yellow-100 text-yellow-700 p-4 rounded mb-5
            flex justify-between items-center">

    <span>

        <?= $this->session->flashdata('error'); ?>

    </span>


    <button
        type="button"
        onclick="closeAlert('alert-error')"
        class="text-red-700 font-bold text-3xl
               hover:text-red-900
               w-10 h-10 flex items-center
               justify-center rounded-full
               hover:bg-red-200">

        &times;

    </button>

</div>

<?php endif; ?>



<!-- =====================================================
     FORM
====================================================== -->

<form
    action="<?= base_url('surat/pengajuan/simpan'); ?>"
    method="post"
    enctype="multipart/form-data"
    id="formPengajuan"
    novalidate>
    



<!-- =====================================================
     DATA PEMOHON
====================================================== -->

<h3 class="text-xl font-semibold mb-6 text-gray-700
           border-b pb-3">

    Data Pemohon

</h3>



<div class="grid md:grid-cols-2 gap-5">


<!-- NIK -->

<div>

<label class="font-semibold">

    NIK

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['nik'] ?? ''
    ); ?>"
    readonly>

</div>



<!-- NAMA -->

<div>

<label class="font-semibold">

    Nama Lengkap

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['nama_lengkap'] ?? ''
    ); ?>"
    readonly>

</div>



<!-- TEMPAT LAHIR -->

<div>

<label class="font-semibold">

    Tempat Lahir

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['tempat_lahir'] ?? ''
    ); ?>"
    readonly>

</div>



<!-- TANGGAL LAHIR -->

<div>

<label class="font-semibold">

    Tanggal Lahir

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['tanggal_lahir'] ?? ''
    ); ?>"
    readonly>

</div>



<!-- JENIS KELAMIN -->

<div>

<label class="font-semibold">

    Jenis Kelamin

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['jenis_kelamin'] ?? ''
    ); ?>"
    readonly>

</div>



<!-- NO HP -->

<div>

<label class="font-semibold">

    No HP

</label>


<input
    type="text"
    name="hp"
    class="w-full border rounded p-2 mt-1"
    placeholder="Nomor HP"
    required>

</div>


</div>



<!-- ALAMAT -->

<div class="mt-5">

<label class="font-semibold">

    Alamat

</label>


<textarea
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    rows="3"
    readonly><?= htmlspecialchars(
        $penduduk['alamat'] ?? ''
    ); ?></textarea>

</div>



<!-- RT RW -->

<div class="grid md:grid-cols-2 gap-5 mt-5">


<div>

<label class="font-semibold">

    RT

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['rt'] ?? ''
    ); ?>"
    readonly>

</div>



<div>

<label class="font-semibold">

    RW

</label>


<input
    type="text"
    class="w-full border rounded p-2 mt-1 bg-gray-100"
    value="<?= htmlspecialchars(
        $penduduk['rw'] ?? ''
    ); ?>"
    readonly>

</div>


</div>



<!-- =====================================================
     JENIS SURAT
====================================================== -->

<h3 class="text-xl font-semibold mt-10 mb-6 text-gray-700
           border-b pb-3">

    Jenis Surat

</h3>



<select
    name="jenis_surat_id"
    id="jenis_surat"
    class="w-full border rounded p-2"
    required>


<option value="">

    -- Pilih Surat --

</option>



<?php foreach ($jenis_surat as $js): ?>

<option
    value="<?= $js['id']; ?>">

    <?= htmlspecialchars(
        $js['nama_surat']
    ); ?>

</option>

<?php endforeach; ?>


</select>



<!-- =====================================================
     LOADING
====================================================== -->

<div
    id="loading_surat"
    class="hidden mt-5 text-green-600">

    Memuat formulir surat...

</div>



<!-- =====================================================
     FIELD DINAMIS PEMOHON
====================================================== -->

<div
    id="field_container"
    class="mt-8">

</div>



<!-- =====================================================
     PERSYARATAN FILE
====================================================== -->

<div
    id="persyaratan_container"
    class="mt-8">

</div>

<!-- =====================================================
     PERNYATAAN
====================================================== -->

<div class="mt-6">


<label class="flex items-center">


<input
    type="checkbox"
    name="pernyataan"
    value="1"
    required
    class="mr-2">


Saya menyatakan data yang saya isi benar.


</label>


</div>



<!-- =====================================================
     BUTTON
====================================================== -->

<div
    class="flex justify-end gap-4 mt-10
           border-t pt-6">


<a
    href="<?= base_url('navbar/layanan_publik'); ?>"
    class="px-6 py-3 bg-gray-500 text-white rounded-lg
           hover:bg-gray-600">

    Batal

</a>



<button
    type="submit"
    id="btnSubmit"
    class="px-8 py-3 bg-green-600 text-white rounded-lg
           hover:bg-green-700">

    Ajukan Surat

</button>


</div>



</form>


</div>

</main>



<!-- =====================================================
     JQUERY
====================================================== -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



<script>


// ========================================================
// PILIH JENIS SURAT
// ========================================================

$('#jenis_surat').on('change', function() {


    let id =
        $(this).val();


    // kosongkan
    $('#field_container').html('');

    $('#persyaratan_container').html('');


    // tidak memilih
    if (id === '') {

        return;

    }


    // tampilkan loading
    $('#loading_surat')
        .removeClass('hidden');


    // ====================================================
    // AJAX
    // ====================================================

    $.ajax({

        url:
            "<?= base_url(
                'surat/pengajuan/getPersyaratan/'
            ); ?>"
            + id,

        type:
            "GET",

        dataType:
            "json",


        success:
            function(data) {


                // sembunyikan loading
                $('#loading_surat')
                    .addClass('hidden');


                // =================================================
                // FIELD PEMOHON
                // =================================================

                let fieldHtml = '';


                if (
                    data.fields &&
                    data.fields.length > 0
                ) {


                    fieldHtml += `

                    <h3
                        class="text-xl font-semibold
                               mb-4 text-gray-700
                               border-b pb-3">

                        Data Tambahan

                    </h3>

                    `;


                    $.each(
                        data.fields,
                        function(i, row) {


                            fieldHtml += `

                            <div class="mb-5">

                                <label
                                    class="font-semibold
                                           block mb-2">

                                    ${escapeHtml(
                                        row.label
                                    )}

                                    ${
                                        row.required == 1
                                        ? '<span class="text-red-500">*</span>'
                                        : ''
                                    }

                                </label>

                            `;


                            // =================================
                            // TEXTAREA
                            // =================================

                            if (
                                row.tipe ===
                                'textarea'
                            ) {


                                fieldHtml += `

                                <textarea
                                    name="field[${row.id}]"
                                    rows="4"
                                    class="w-full border
                                           rounded-lg p-3"
                                    ${
                                        row.required == 1
                                        ? 'required'
                                        : ''
                                    }></textarea>

                                `;

                            }


                            // =================================
                            // NUMBER
                            // =================================

                            else if (
                                row.tipe ===
                                'number'
                            ) {


                                fieldHtml += `

                                <input
                                    type="number"
                                    name="field[${row.id}]"
                                    class="w-full border
                                           rounded-lg p-3"
                                    ${
                                        row.required == 1
                                        ? 'required'
                                        : ''
                                    }>

                                `;

                            }


                            // =================================
                            // DATE
                            // =================================

                            else if (
                                row.tipe ===
                                'date'
                            ) {


                                fieldHtml += `

                                <input
                                    type="date"
                                    name="field[${row.id}]"
                                    class="w-full border
                                           rounded-lg p-3"
                                    ${
                                        row.required == 1
                                        ? 'required'
                                        : ''
                                    }>

                                `;

                            }


                            // =================================
                            // TEXT
                            // =================================

                            else {


                                fieldHtml += `

                                <input
                                    type="text"
                                    name="field[${row.id}]"
                                    class="w-full border
                                           rounded-lg p-3"
                                    ${
                                        row.required == 1
                                        ? 'required'
                                        : ''
                                    }>

                                `;

                            }


                            fieldHtml += `

                            </div>

                            `;

                        }
                    );

                }


                // tampilkan field
                $('#field_container')
                    .html(fieldHtml);



                // =================================================
                // FILE PERSYARATAN
                // =================================================

                let fileHtml = '';


                if (
                    data.persyaratan &&
                    data.persyaratan.length > 0
                ) {


                    fileHtml += `

                    <h3
                        class="text-xl font-semibold
                               mt-8 mb-4 text-gray-700
                               border-b pb-3">

                        Upload Persyaratan

                    </h3>

                    `;


                    $.each(
                        data.persyaratan,
                        function(i, row) {


                            fileHtml += `

                            <div class="mb-5">

                                <label
                                    class="font-semibold
                                           block mb-2">

                                    ${escapeHtml(
                                        row.nama_persyaratan
                                    )}

                                    <span
                                        class="text-red-500">

                                        *

                                    </span>

                                </label>


                                <input
                                    type="file"
                                    name="persyaratan_${row.id}"
                                    class="w-full border
                                           rounded-lg p-3"
                                    accept=".jpg,.jpeg,.png,.pdf"
                                    required>


                                <p
                                    class="text-sm text-gray-500
                                           mt-1">

                                    Format:
                                    JPG, JPEG, PNG, atau PDF.
                                    Maksimal 2 MB.

                                </p>

                            </div>

                            `;

                        }
                    );

                }
                else {


                    fileHtml += `

                    <div
                        class="bg-blue-50
                               text-blue-700
                               p-4 rounded-lg mt-6">

                        Surat ini tidak memiliki
                        persyaratan file.

                    </div>

                    `;

                }


                // tampilkan file
                $('#persyaratan_container')
                    .html(fileHtml);

            },


        error:
            function(xhr) {


                $('#loading_surat')
                    .addClass('hidden');


                console.log(
                    xhr.responseText
                );


                $('#field_container')
                    .html('');


                $('#persyaratan_container')
                    .html(`

                        <div
                            class="bg-red-100
                                   text-red-700
                                   p-4 rounded-lg">

                            Gagal mengambil data
                            persyaratan surat.

                        </div>

                    `);

            }

    });

});



// ========================================================
// ESCAPE HTML
// Mencegah label dari database merusak HTML
// ========================================================

function escapeHtml(text)
{

    if (!text) {

        return '';

    }


    return String(text)

        .replace(
            /&/g,
            '&amp;'
        )

        .replace(
            /</g,
            '&lt;'
        )

        .replace(
            />/g,
            '&gt;'
        )

        .replace(
            /"/g,
            '&quot;'
        )

        .replace(
            /'/g,
            '&#039;'
        );

}



// ========================================================
// CLOSE ALERT
// ========================================================

function closeAlert(id)
{

    let alert =
        document.getElementById(id);


    if (alert) {

        alert.style.display =
            'none';

    }

}



// ========================================================
// VALIDASI FORM + CEGAH DOUBLE SUBMIT
// ========================================================


$('#formPengajuan').on('submit', function(e) {


// ==========================
// CEK NO HP
// ==========================

let noHp = $('input[name="hp"]');


if (noHp.val().trim() === '') {


    e.preventDefault();


    alert(
        'Nomor HP wajib diisi.'
    );


    noHp.focus();


    noHp[0].scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });


    return false;

}

    // ==========================
    // CEK JENIS SURAT
    // ==========================

    let jenisSurat = $('#jenis_surat');


    if (jenisSurat.val() === '') {


        e.preventDefault();


        alert(
            'Silakan pilih jenis surat terlebih dahulu.'
        );


        jenisSurat.focus();


        jenisSurat[0].scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });


        return false;

    }

    




    // ==========================
    // CEK FIELD TAMBAHAN
    // ==========================

    let fieldKosong = null;

$('#field_container')
.find('input, textarea, select')
.each(function() {

    if (
        $(this).prop('required') &&
        $(this).val() === ''
    ) {

        fieldKosong = $(this);

        return false;

    }

});



    if (fieldKosong !== null) {


        e.preventDefault();


        alert(
            'Mohon lengkapi data tambahan surat terlebih dahulu.'
        );


        fieldKosong.focus();


        fieldKosong[0].scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });


        return false;

    }




    // ==========================
    // CEK FILE PERSYARATAN
    // ==========================

    let fileKosong = null;


    $('#persyaratan_container')
        .find('input[type="file"]')
        .each(function() {


            if (
                $(this).prop('required') &&
                $(this).val() === ''
            ) {


                fileKosong = $(this);


                return false;

            }


        });



    if (fileKosong !== null) {


        e.preventDefault();


        alert(
            'Mohon upload semua file persyaratan surat.'
        );


        fileKosong.focus();


        fileKosong[0].scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });


        return false;

    }




    // ==========================
    // CEK PERNYATAAN
    // ==========================

    let pernyataan =
        $('input[name="pernyataan"]');


    if (!pernyataan.is(':checked')) {


        e.preventDefault();


        alert(
            'Silakan centang pernyataan bahwa data yang diisi benar.'
        );


        pernyataan.focus();


        return false;

    }




    // ==========================
    // CEGAH DOUBLE SUBMIT
    // ==========================

    $('#btnSubmit')
        .prop(
            'disabled',
            true
        );


    $('#btnSubmit')
        .text(
            'Mengirim...'
        );


});


</script>