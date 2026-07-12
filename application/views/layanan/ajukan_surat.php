<!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center space-x-3">
                <img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=48&q=80" alt="Logo Desa" class="h-12 w-12 rounded-full">
                <div>
                    <h1 class="text-xl font-bold">Desa Kelating</h1>
                    <p class="text-sm text-gray-500">Bersama membangun desa yang mandiri dan sejahtera</p>
                </div>
            </div>
            <!-- Hamburger button for mobile/tablet -->
            <button id="menu-toggle" class="lg:hidden flex items-center px-3 py-2 border rounded text-green-700 border-green-700 focus:outline-none" aria-label="Toggle Menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <!-- Desktop Navigation -->
            <nav class="items-center hidden lg:flex gap-6">
                <a href="<?php echo base_url('beranda'); ?>" class="hover:text-green-600 font-medium">Beranda</a>
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium">Profil Desa</a>
                <a href="<?php echo base_url('navbar/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Layanan Publik</a>
                <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>" class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
                <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
                <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
                <!-- Button Login -->
                <a href="<?php echo base_url('auth/login'); ?>" class="bg-green-600 text-white px-5 py-2 rounded-md font-semibold shadow hover:bg-green-700 transition duration-200">
                    Login
                </a>
            </nav>
        </div>
        <!-- Mobile/Tablet Navigation -->
        <nav id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-white w-4/5 max-w-xs h-full shadow-lg p-6 flex flex-col gap-4 animate-slideInLeft">
                <button id="menu-close" class="self-end mb-4 text-gray-700" aria-label="Tutup Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <a href="<?php echo base_url('beranda'); ?>" class="hover:text-green-600 font-medium">Beranda</a>
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium">Profil Desa</a>
                <a href="<?php echo base_url('navbar/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Layanan Publik</a>
                <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>" class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
                <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
                <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
            </div>
        </nav>
    </header>

<main class="container mx-auto py-10 px-4">

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
            Form Pengajuan Surat Online
        </h2>

        <p class="text-center text-gray-500 mb-8">
            Silakan isi formulir berikut dengan benar.
        </p>

        <form action="<?= base_url('pengajuan/simpan') ?>" method="post" enctype="multipart/form-data">

            <!-- Data Pemohon -->

            <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">
                Data Pemohon
            </h3>

            <div class="grid md:grid-cols-2 gap-5">

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
                    <label class="font-semibold">Nomor KK</label>
                    <input type="text" name="kk"
                        class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">No. HP</label>
                    <input type="text" name="hp"
                        class="w-full border rounded p-2 mt-1">
                </div>

            </div>

            <div class="mt-5">

                <label class="font-semibold">Alamat</label>

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

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label class="font-semibold">
                        Scan KTP
                    </label>

                    <input
                        type="file"
                        name="ktp"
                        class="w-full border rounded p-2 mt-1">

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