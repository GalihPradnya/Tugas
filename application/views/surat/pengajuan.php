<main class="container mx-auto py-10 px-4">


    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
            Form Pengajuan Surat
        </h2>

        <p class="text-center text-gray-500 mb-8">
            Silakan isi formulir berikut dengan benar.
        </p>
            <?php if($this->session->flashdata('success')): ?>

            <div class="bg-green-100 text-green-700 p-3 rounded mb-5">

                <?= $this->session->flashdata('success'); ?>

            </div>

            <?php endif; ?>

        <form action="<?= base_url('surat/pengajuan/simpan') ?>" method="post" enctype="multipart/form-data">

            <!-- DATA PEMOHON -->
            <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">
                Data Pemohon
            </h3>

            <div class="grid md:grid-cols-1 gap-5">

                <div>
                    <label class="font-semibold">NIK</label>
                    <input
                        type="text"
                        name="nik"
                        maxlength="16"
                        class="w-full border rounded p-2 mt-1"
                        required>
                </div>

                <div>
                    <label class="font-semibold">Nama Lengkap</label>
                    <input
                        type="text"
                        name="nama"
                        class="w-full border rounded p-2 mt-1"
                        required>
                </div>

                <div>
                    <label class="font-semibold">No. HP</label>
                    <input
                        type="text"
                        name="hp"
                        class="w-full border rounded p-2 mt-1">
                </div>

            </div>

            <!-- ALAMAT -->
            <div class="mt-5">

                <label class="font-semibold">Alamat</label>

                <select
                    name="alamat_id"
                    id="alamat"
                    class="w-full border rounded p-2">

                    <?php foreach($alamat as $a): ?>

                    <option value="<?= $a['id']; ?>">
                        <?= $a['nama_alamat']; ?>
                    </option>

                <?php endforeach; ?>

                <option value="lainnya">
                    Lainnya
                </option>

                </select>

                <div id="alamat_lainnya_container" style="display:none;">

                    <textarea
                        name="alamat_lainnya"
                        rows="3"
                        placeholder="Masukkan alamat"
                        class="w-full border rounded p-2 mt-2"></textarea>

                </div>

            </div>

            <!-- JENIS SURAT -->
            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-700 border-b pb-2">
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

                <?php foreach($jenis_surat as $js): ?>

                    <option value="<?= $js['id']; ?>">
                        <?= $js['nama_surat']; ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <!-- PERSYARATAN DINAMIS -->
            <div id="persyaratan_container" class="mt-5"></div>

            <!-- KEPERLUAN -->
            <div class="mt-5">

                <label class="font-semibold">Keperluan</label>

                <textarea
                    name="keperluan"
                    rows="4"
                    class="w-full border rounded p-2 mt-1"></textarea>

            </div>

            <!-- CATATAN -->
            <div class="mt-5">

                <label class="font-semibold">Catatan</label>

                <textarea
                    name="catatan"
                    rows="3"
                    class="w-full border rounded p-2 mt-1"></textarea>

            </div>

            <!-- PERNYATAAN -->
            <div class="mt-6">

                <label class="flex items-center">

                    <input
                        type="checkbox"
                        required
                        class="mr-2">

                    Saya menyatakan data yang saya isi benar.

                </label>

            </div>

            <!-- TOMBOL -->
            <div class="flex justify-end gap-3 mt-8">

                <a href="<?= base_url('navbar/layanan_publik') ?>"
                    class="bg-gray-500 text-white px-5 py-2 rounded hover:bg-gray-600">

                    Batal

                </a>

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">

                    Ajukan Surat

                </button>

            </div>

        </form>

    </div>

</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

document.getElementById('alamat').addEventListener('change', function() {

    const container = document.getElementById('alamat_lainnya_container');

    if (this.value === 'lainnya') {
        container.style.display = 'block';
    } else {
        container.style.display = 'none';
    }

});

$('#jenis_surat').change(function(){

    let id = $(this).val();

    if(id == '')
    {
        $('#persyaratan_container').html('');
        return;
    }

    $.ajax({

        url : "<?= base_url('surat/pengajuan/getPersyaratan/') ?>" + id,

        type : "GET",

        dataType : "json",

        success : function(data)
        {
            console.log(data);

            let html = '';

            html += `
                <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-700 border-b pb-2">
                    Upload Persyaratan
                </h3>
            `;

            $.each(data, function(i, row){

                html += `
                    <div class="mb-4">

                        <label class="font-semibold">
                            ${row.nama_persyaratan}
                        </label>

                        <input
                            type="file"
                            name="persyaratan_${row.id}"
                            class="w-full border rounded p-2 mt-1"
                            required>

                    </div>
                `;
            });

            $('#persyaratan_container').html(html);
        },

        error : function(xhr)
        {
            console.log(xhr.responseText);
        }

    });

});

</script>