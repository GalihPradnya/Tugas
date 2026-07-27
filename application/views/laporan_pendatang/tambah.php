<main class="container mx-auto py-12 px-4">

<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8 md:p-10">

    <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
        Form Laporan Pendatang
    </h2>

    <p class="text-center text-gray-500 mb-8">
        Silakan isi data pendatang dengan benar.
    </p>

    <?php if($this->session->flashdata('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-5">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('pendatang/laporan_pendatang/simpan'); ?>" method="post">

        <!-- DATA PELAPOR -->

        <h3 class="text-xl font-semibold mb-6 text-gray-700 border-b pb-3">
            Data Pelapor
        </h3>

        <div class="grid md:grid-cols-2 gap-5">

            <div>
                <label class="font-semibold">NIK</label>
                <input type="text"
                    class="w-full border rounded p-2 mt-1 bg-gray-100"
                    value="<?= $penduduk['nik']; ?>"
                    readonly>
            </div>

            <div>
                <label class="font-semibold">Nama Lengkap</label>
                <input type="text"
                    class="w-full border rounded p-2 mt-1 bg-gray-100"
                    value="<?= $penduduk['nama_lengkap']; ?>"
                    readonly>
            </div>

            <div>
                <label class="font-semibold">Tempat Lahir</label>
                <input type="text"
                    class="w-full border rounded p-2 mt-1 bg-gray-100"
                    value="<?= $penduduk['tempat_lahir']; ?>"
                    readonly>
            </div>

            <div>
                <label class="font-semibold">Tanggal Lahir</label>
                <input type="text"
                    class="w-full border rounded p-2 mt-1 bg-gray-100"
                    value="<?= $penduduk['tanggal_lahir']; ?>"
                    readonly>
            </div>

            <div>
                <label class="font-semibold">RT</label>
                <input type="text"
                    class="w-full border rounded p-2 mt-1 bg-gray-100"
                    value="<?= $penduduk['rt']; ?>"
                    readonly>
            </div>

            <div>
                <label class="font-semibold">RW</label>
                <input type="text"
                    class="w-full border rounded p-2 mt-1 bg-gray-100"
                    value="<?= $penduduk['rw']; ?>"
                    readonly>
            </div>

        </div>

        <div class="mt-5">

            <label class="font-semibold">
                Alamat
            </label>

            <textarea
                class="w-full border rounded p-2 mt-1 bg-gray-100"
                rows="3"
                readonly><?= $penduduk['alamat']; ?></textarea>

        </div>


        <!-- DATA PENDATANG -->

        <h3 class="text-xl font-semibold mt-10 mb-6 text-gray-700 border-b pb-3">
            Data Pendatang
        </h3>

        <div class="grid md:grid-cols-2 gap-5">

            <div>
                <label class="font-semibold">
                    NIK Pendatang
                </label>

                <input
                    type="text"
                    name="nik"
                    maxlength="16"
                    class="w-full border rounded-lg p-3 mt-2"
                    placeholder="Masukkan NIK Pendatang">
            </div>

            <div>
                <label class="font-semibold">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="nama_lengkap"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-semibold">
                    Tempat Lahir
                </label>

                <input
                    type="text"
                    name="tempat_lahir"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-semibold">
                    Tanggal Lahir
                </label>

                <input
                    type="date"
                    name="tanggal_lahir"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-semibold">
                    Jenis Kelamin
                </label>

                <select
                    name="jenis_kelamin"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>

                    <option value="">-- Pilih --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>

                </select>

            </div>

            <div>
                <label class="font-semibold">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="nomor_hp"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">
                    Email Pendatang
                </label>

                <input
                    type="email"
                    name="email"
                    value="<?= set_value('email'); ?>"
                    class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="contoh@email.com">

                <?php if(form_error('email')): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= form_error('email', '', ''); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div>
                <label class="font-semibold">
                    Pekerjaan
                </label>

                <input
                    type="text"
                    name="pekerjaan"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>

        </div>


        <div class="mt-6">

            <label class="font-semibold">
                Alamat Asal
            </label>

            <textarea
                name="alamat_asal"
                rows="3"
                class="w-full border rounded-lg p-3 mt-2"
                required></textarea>

        </div>

        <div class="mt-6">

            <label class="font-semibold">
                Alamat Tinggal Saat Ini
            </label>

            <textarea
                name="alamat_tinggal"
                rows="3"
                class="w-full border rounded-lg p-3 mt-2"
                required></textarea>

        </div>


        <!-- INFORMASI TINGGAL -->

        <h3 class="text-xl font-semibold mt-10 mb-6 text-gray-700 border-b pb-3">
            Informasi Tinggal
        </h3>

        <div class="grid md:grid-cols-2 gap-5">

            <div>

                <label class="font-semibold">
                    Tanggal Datang
                </label>

                <input
                    type="date"
                    name="tanggal_datang"
                    class="w-full border rounded-lg p-3 mt-2">

            </div>

            <div>

                <label class="font-semibold">
                    Tempat Tinggal
                </label>

                <select
                    name="tempat_tinggal"
                    class="w-full border rounded-lg p-3 mt-2">

                    <option value="">-- Pilih --</option>
                    <option value="Rumah">Rumah</option>
                    <option value="Kos">Kos</option>
                    <option value="Kontrakan">Kontrakan</option>
                    <option value="Saudara">Saudara</option>
                    <option value="Lainnya">Lainnya</option>

                </select>

            </div>

            <div class="md:col-span-2">

                <label class="font-semibold">
                    Lama Tinggal
                </label>

                <input
                    type="text"
                    name="lama_tinggal"
                    class="w-full border rounded-lg p-3 mt-2"
                    placeholder="Contoh : 3 Bulan">

            </div>

        </div>


        <!-- KETERANGAN -->

        <div class="mt-6">

            <label class="font-semibold">
                Keterangan
            </label>

            <textarea
                name="keterangan"
                rows="4"
                class="w-full border rounded-lg p-3 mt-2"
                placeholder="Tambahkan informasi apabila diperlukan"></textarea>

        </div>


        <!-- PERNYATAAN -->

        <div class="mt-6">

            <label class="flex items-center">

                <input
                    type="checkbox"
                    required
                    class="mr-2">

                Saya menyatakan data yang saya laporkan adalah benar.

            </label>

        </div>


        <!-- BUTTON -->

        <div class="flex justify-end gap-4 mt-10 border-t pt-6">

            <a href="<?= base_url('navbar/layanan_publik'); ?>"
                class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600">

                Batal

            </a>

            <button
                type="submit"
                class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">

                Kirim Laporan

            </button>

        </div>

    </form>

</div>

</main>