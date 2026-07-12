
<main class="container mx-auto py-10 px-4">

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
            Form Pengajuan Surat
        </h2>

        <p class="text-center text-gray-500 mb-8">
            Silakan isi formulir berikut dengan benar.
        </p>

        <form action="<?= base_url('pengajuan/simpan') ?>" method="post" enctype="multipart/form-data">

            <!-- Data Pemohon -->

            <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">
                Data Pemohon
            </h3>

            <div class="grid md:grid-cols-1 gap-5">
           

                <div>
                    <label class="font-semibold">NIK</label>
                    <input type="text" name="nik"
                        class="w-full border rounded p-2 mt-1"
                        maxlength="16"
                        required>
                </div>

                <div>
                    <label class="font-semibold">Nama Lengkap</label>
                    <input type="text" name="nama"
                        class="w-full border rounded p-2 mt-1"
                        required>
                </div>


                <div>
                    <label class="font-semibold">No. HP</label>
                    <input type="text" name="hp"
                        class="w-full border rounded p-2 mt-1">
                </div>

            </div>

            <div class="mt-5">

                <label class="font-semibold">Alamat</label>
                <select
                    name="alamat"
                    class="w-full border rounded p-2">

                <option value="">-- Pilih Alamat --</option>

                <option>Banjar Dinas Dauh Jalan</option>

                <option>Banjar Dinas Dauh Jalan</option>
                
                <option>Lainnya</option>

            </select>

                <textarea name="alamat"
                    rows="3"
                    class="w-full border rounded p-2 mt-1"></textarea>

                </div>


            <!-- Jenis Surat -->

            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-700 border-b pb-2">
                Jenis Surat
            </h3>
             <select
                name="jenis_surat"
                class="w-full border rounded p-2">

                <option value="">-- Pilih Surat --</option>

                <option>Surat Keterangan Domisili</option>

                <option>Surat Keterangan Usaha</option>

                <option>Surat Keterangan Tidak Mampu</option>

                <option>Surat Pengantar KTP</option>

                <option>Surat Pengantar KK</option>

                <option>Surat Keterangan Belum Menikah</option>

                <option>Surat Keterangan Kelahiran</option>

                <option>Surat Keterangan Kematian</option>

                <option>Lainnya</option>

            </select>
            <div>
            <input type="text" name="nik"
            class="w-full border rounded p-2 mt-1"
            maxlength="16"
            required>
            </div>
            <!-- Keperluan -->

            <div class="mt-5">

                <label class="font-semibold">Keperluan</label>

                <textarea
                    name="keperluan"
                    rows="4"
                    class="w-full border rounded p-2 mt-1"></textarea>

            </div>

            <!-- Upload -->

            <h3 class="text-xl font-semibold mt-8 mb-4 text-gray-700 border-b pb-2">
                Upload Persyaratan
            </h3>

            <div class="grid md:grid-cols-1 gap-5">

                <div>

                <label class="font-semibold">
                        Scan KTP
                </label>

                 <form action="<?= base_url('navbar/surat/upload_foto'); ?>" method="post" enctype="multipart/form-data">

                    <input type="file"
                        name="foto"
                        accept="image/*"
                        capture="environment"
                        class="w-full border rounded p-2 mt-1">
                        

                    <button type="submit">Upload</button>

                </form>

                </div>

                <div>

                    <label class="font-semibold">
                        Scan KK
                    </label>

                    <input
                        type="file"
                        name="kk_file"
                        class="w-full border rounded p-2 mt-1">

                </div>

            </div>

            <div class="mt-5">

                <label class="font-semibold">
                    Dokumen Pendukung
                </label>

                <input
                    type="file"
                    name="dokumen"
                    class="w-full border rounded p-2 mt-1">

            </div>

            <!-- Catatan -->

            <div class="mt-6">

                <label class="font-semibold">
                    Catatan
                </label>

                <textarea
                    name="catatan"
                    rows="3"
                    class="w-full border rounded p-2 mt-1"></textarea>

            </div>

            <!-- Pernyataan -->

            <div class="mt-6">

                <label class="flex items-center">

                    <input
                        type="checkbox"
                        required
                        class="mr-2">

                    Saya menyatakan data yang saya isi benar.

                </label>

            </div>

            <!-- Tombol -->

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