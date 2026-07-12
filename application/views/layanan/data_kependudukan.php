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

    <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
        Data Kependudukan Desa Kelating
    </h2>

    <p class="text-center text-gray-500 mb-10">
        Informasi statistik kependudukan Desa Kelating.
    </p>

    <!-- Statistik -->

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Jumlah Penduduk</h3>
            <p class="text-4xl font-bold text-green-600">4.258</p>
            <p class="text-sm text-gray-500">Jiwa</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Jumlah KK</h3>
            <p class="text-4xl font-bold text-blue-600">1.342</p>
            <p class="text-sm text-gray-500">KK</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Laki-laki</h3>
            <p class="text-4xl font-bold text-indigo-600">2.130</p>
            <p class="text-sm text-gray-500">Jiwa</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Perempuan</h3>
            <p class="text-4xl font-bold text-pink-600">2.128</p>
            <p class="text-sm text-gray-500">Jiwa</p>
        </div>

    </div>

    <!-- Tabel -->

    <div class="bg-white rounded-lg shadow">

        <div class="p-5 border-b">
            <h3 class="text-xl font-semibold">
                Statistik Penduduk Berdasarkan Banjar
            </h3>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-green-600 text-white">

                    <tr>

                        <th class="py-3">No</th>

                        <th>Banjar</th>

                        <th>Laki-laki</th>

                        <th>Perempuan</th>

                        <th>Total</th>

                        <th>Jumlah KK</th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">1</td>

                        <td>Banjar Kelating Kaja</td>

                        <td class="text-center">560</td>

                        <td class="text-center">548</td>

                        <td class="text-center font-semibold">1108</td>

                        <td class="text-center">340</td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">2</td>

                        <td>Banjar Kelating Kelod</td>

                        <td class="text-center">610</td>

                        <td class="text-center">598</td>

                        <td class="text-center font-semibold">1208</td>

                        <td class="text-center">381</td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">3</td>

                        <td>Banjar Tengah</td>

                        <td class="text-center">480</td>

                        <td class="text-center">501</td>

                        <td class="text-center font-semibold">981</td>

                        <td class="text-center">306</td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">4</td>

                        <td>Banjar Dauh Peken</td>

                        <td class="text-center">480</td>

                        <td class="text-center">481</td>

                        <td class="text-center font-semibold">961</td>

                        <td class="text-center">315</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- Tombol -->

    <div class="text-center mt-8">

        <a href="<?= base_url('navbar/layanan_publik') ?>"
           class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">

            Kembali

        </a>

    </div>

</main>