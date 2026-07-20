<main class="container mx-auto py-10 px-4">

    <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-lg p-8">

        <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
            Pendataan Warga Pendatang
        </h2>

        <p class="text-center text-gray-500 mb-8">
            Silakan lengkapi data berikut untuk pendataan warga pendatang di Desa Kelating.
        </p>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('pendatang/pendatang/simpan'); ?>"
              method="post"
              enctype="multipart/form-data">

            <!-- DATA DIRI -->

            <h3 class="text-xl font-semibold border-b pb-2 mb-5">
                Data Diri
            </h3>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="font-semibold">NIK</label>

                    <input type="text"
                           name="nik"
                           maxlength="16"
                           required
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">Nama Lengkap</label>

                    <input type="text"
                           name="nama"
                           required
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            required
                            class="w-full border rounded p-2 mt-1">

                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>

                    </select>
                </div>

                <div>
                    <label class="font-semibold">
                        Nomor HP
                    </label>

                    <input type="text"
                           name="telepon"
                           required
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">
                        Tempat Lahir
                    </label>

                    <input type="text"
                           name="tempat_lahir"
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">
                        Tanggal Lahir
                    </label>

                    <input type="date"
                           name="tanggal_lahir"
                           class="w-full border rounded p-2 mt-1">
                </div>

            </div>

            <!-- ALAMAT -->

            <h3 class="text-xl font-semibold border-b pb-2 mt-8 mb-5">
                Data Kedatangan
            </h3>

            <div class="space-y-5">

                <div>
                    <label class="font-semibold">
                        Alamat Asal
                    </label>

                    <textarea
                        name="alamat_asal"
                        rows="3"
                        required
                        class="w-full border rounded p-2 mt-1"></textarea>
                </div>

                <div>
                    <label class="font-semibold">
                        Alamat Tinggal di Desa Kelating
                    </label>

                    <textarea
                        name="alamat_tinggal"
                        rows="3"
                        required
                        class="w-full border rounded p-2 mt-1"></textarea>
                </div>

                <div>
                    <label class="font-semibold">
                        Tujuan Datang
                    </label>

                    <input type="text"
                           name="tujuan_datang"
                           placeholder="Bekerja, Menetap, Kuliah, dll"
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="font-semibold">
                            Tanggal Datang
                        </label>

                        <input type="date"
                               name="tanggal_datang"
                               required
                               class="w-full border rounded p-2 mt-1">
                    </div>

                    <div>
                        <label class="font-semibold">
                            Lama Tinggal
                        </label>

                        <input type="text"
                               name="lama_tinggal"
                               placeholder="3 Bulan / 1 Tahun"
                               class="w-full border rounded p-2 mt-1">
                    </div>

                </div>

            </div>

            <!-- LAMPIRAN -->

            <h3 class="text-xl font-semibold border-b pb-2 mt-8 mb-5">
                Lampiran
            </h3>

            <div class="space-y-5">

                <div>
                    <label class="font-semibold">
                        Foto Warga Pendatang
                    </label>

                    <input type="file"
                           name="foto_warga"
                           accept="image/*"
                           required
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">
                        Foto KTP
                    </label>

                    <input type="file"
                           name="foto_ktp"
                           accept="image/*,.pdf"
                           required
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">
                        Foto KK (Opsional)
                    </label>

                    <input type="file"
                           name="foto_kk"
                           accept="image/*,.pdf"
                           class="w-full border rounded p-2 mt-1">
                </div>

            </div>

            <!-- PERNYATAAN -->

            <div class="mt-8">

                <label class="flex items-center">

                    <input type="checkbox"
                           required
                           class="mr-2">

                    Saya menyatakan data yang saya isi adalah benar dan dapat dipertanggungjawabkan.

                </label>

            </div>

            <!-- BUTTON -->

            <div class="flex justify-end gap-3 mt-8">

                <a href="<?= base_url('pendatang/pendatang'); ?>"
                   class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">

                    Kembali

                </a>

                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">

                    Kirim Data

                </button>

            </div>

        </form>

    </div>

</main>