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
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Profil Desa</a>
                <a href="<?php echo base_url('navbar/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium">Layanan Publik</a>
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
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Profil Desa</a>
                <a href="<?php echo base_url('navbar/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium">Layanan Publik</a>
                <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>" class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
                <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
                <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
            </div>
        </nav>
    </header>

    <!-- Profil Desa -->
    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Profil Desa Kelating</h2>
        <p class="text-gray-500 mb-6 text-base text-center">Informasi lengkap tentang sejarah, visi misi, dan data singkat Desa Kelating.</p>
        <div class="md:flex md:gap-8 mb-8">

    <div class="w-full md:w-75 h-50 flex-shrink-0">
        <img src="<?= base_url('uploads/profil/'.$profil->gambar); ?>"
             alt="Profil Desa"
             class="w-full h-full rounded-lg shadow object-cover">
    </div>

    <div class="flex-1">
        <h3 class="text-2xl font-semibold mb-2">Tentang Desa</h3>

        <p class="mb-2">
            <?= nl2br($profil->tentang); ?>
        </p>
    </div>

</div>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-xl font-semibold mb-2">Visi</h4>
                <p class="mb-4 italic">"<?=($profil->visi); ?>"</p>
                <h4 class="text-xl font-semibold mb-2">Misi</h4>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach($misi as $item){ ?>
                    <li><?= $item->isi_misi; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-2">Data Singkat Desa</h4>
                <table class="w-full text-sm">
                    <tr>
                        <td class="py-1 font-medium">Luas Wilayah</td>
                        <td>: <?= $profil->luas_wilayah; ?> Ha</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Jumlah Penduduk</td>
                        <td>: <?= number_format($profil->jumlah_penduduk,0,',','.'); ?> Jiwa</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Dusun</td>
                        <td>: <?= $profil->jumlah_dusun; ?> Dusun</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">RT/RW</td>
                        <td>: <?= $profil->jumlah_rt; ?>/<?= $profil->jumlah_rw; ?></td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Kode Pos</td>
                        <td>: <?= $profil->kode_pos; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
