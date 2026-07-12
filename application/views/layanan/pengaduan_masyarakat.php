
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

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">

        <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
            Pengaduan Masyarakat
        </h2>

        <p class="text-center text-gray-500 mb-8">
            Silakan sampaikan pengaduan atau aspirasi Anda kepada Pemerintah Desa Kelating.
        </p>

        <form action="<?= base_url('pengaduan/simpan') ?>" method="post" enctype="multipart/form-data">

            <!-- Data Pelapor -->

            <h3 class="text-xl font-semibold border-b pb-2 mb-5">
                Data Pelapor
            </h3>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="font-semibold">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           class="w-full border rounded p-2 mt-1"
                           required>
                </div>

                <div>
                    <label class="font-semibold">NIK</label>
                    <input type="text"
                           name="nik"
                           maxlength="16"
                           class="w-full border rounded p-2 mt-1">
                </div>

                <div>
                    <label class="font-semibold">Nomor HP / WhatsApp</label>
                    <input type="text"
                           name="telepon"
                           class="w-full border rounded p-2 mt-1"
                           required>
                </div>

                <div>
                    <label class="font-semibold">Email (Opsional)</label>
                    <input type="email"
                           name="email"
                           class="w-full border rounded p-2 mt-1">
                </div>

            </div>

            <!-- Pengaduan -->

            <h3 class="text-xl font-semibold border-b pb-2 mt-8 mb-5">
                Detail Pengaduan
            </h3>

            <div class="mb-5">

                <label class="font-semibold">Kategori Pengaduan</label>

                <select name="kategori"
                        class="w-full border rounded p-2 mt-1"
                        required>

                    <option value="">-- Pilih Kategori --</option>
                    <option>Pelayanan Desa</option>
                    <option>Infrastruktur</option>
                    <option>Kebersihan Lingkungan</option>
                    <option>Keamanan</option>
                    <option>Bantuan Sosial</option>
                    <option>Administrasi</option>
                    <option>Lainnya</option>

                </select>

            </div>

            <div class="mb-5">

                <label class="font-semibold">Judul Pengaduan</label>

                <input type="text"
                       name="judul"
                       class="w-full border rounded p-2 mt-1"
                       required>

            </div>

            <div class="mb-5">

                <label class="font-semibold">Isi Pengaduan</label>

                <textarea
                    name="isi_pengaduan"
                    rows="6"
                    class="w-full border rounded p-2 mt-1"
                    required></textarea>

            </div>

            <div class="mb-5">

                <label class="font-semibold">Lokasi Kejadian</label>

                <input type="text"
                       name="lokasi"
                       class="w-full border rounded p-2 mt-1">

            </div>

            <div class="mb-5">

                <label class="font-semibold">Upload Bukti (Foto/PDF)</label>

                <input type="file"
                       name="bukti"
                       class="w-full border rounded p-2 mt-1">

            </div>

            <div class="mb-6">

                <label class="flex items-center">

                    <input type="checkbox" required class="mr-2">

                    Saya menyatakan bahwa laporan yang saya berikan adalah benar dan dapat dipertanggungjawabkan.

                </label>

            </div>

            <div class="flex justify-end gap-3">

                <a href="<?= base_url('navbar/layanan_publik') ?>"
                   class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">

                    Kembali

                </a>

                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">

                    Kirim Pengaduan

                </button>

            </div>

        </form>

    </div>

</main>