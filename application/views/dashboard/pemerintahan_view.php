<!-- Header -->
<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <div class="flex items-center space-x-3">
            <img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=48&q=80"
                alt="Logo Desa" class="h-12 w-12 rounded-full">
            <div>
                <h1 class="text-xl font-bold">Desa Kelating</h1>
                <p class="text-sm text-gray-500">Bersama membangun desa yang mandiri dan sejahtera</p>
            </div>
        </div>
        <!-- Hamburger button for mobile/tablet -->
        <button id="menu-toggle"
            class="lg:hidden flex items-center px-3 py-2 border rounded text-green-700 border-green-700 focus:outline-none"
            aria-label="Toggle Menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <!-- Desktop Navigation -->
        <nav class="items-center hidden lg:flex gap-6">
            <a href="<?php echo base_url('beranda'); ?>" class="hover:text-green-600 font-medium">Beranda</a>
            <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium">Profil
                Desa</a>
            <a href="<?php echo base_url('navbar/pemerintahan'); ?>"
                class="hover:text-green-600 font-medium text-green-700 font-bold">Pemerintahan</a>
            <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium">Layanan
                Publik</a>
            <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>"
                class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
            <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
            <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
            <!-- Button Login -->
            <a href="<?php echo base_url('auth/login'); ?>"
                class="bg-green-600 text-white px-5 py-2 rounded-md font-semibold shadow hover:bg-green-700 transition duration-200">
                Login
            </a>
        </nav>
    </div>
    <!-- Mobile/Tablet Navigation -->
    <nav id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white w-4/5 max-w-xs h-full shadow-lg p-6 flex flex-col gap-4 animate-slideInLeft">
            <button id="menu-close" class="self-end mb-4 text-gray-700" aria-label="Tutup Menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <a href="<?php echo base_url('beranda'); ?>" class="hover:text-green-600 font-medium">Beranda</a>
            <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium">Profil
                Desa</a>
            <a href="<?php echo base_url('navbar/pemerintahan'); ?>"
                class="hover:text-green-600 font-medium text-green-700 font-bold">Pemerintahan</a>
            <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium">Layanan
                Publik</a>
            <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>"
                class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
            <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
            <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
        </div>
    </nav>
</header>

<!-- Pemerintahan Desa -->
<main class="container mx-auto py-12 px-4 flex-1">
    <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Struktur Pemerintahan Desa Kelating</h2>
    <p class="text-gray-500 mb-6 text-base text-center">Informasi tentang perangkat desa, BPD, dan lembaga desa lainnya.
    </p>
    <div class="bg-white rounded-lg shadow p-6 mb-8">

        <!-- <h3 class="text-2xl font-semibold mb-6 text-center">
        Kepala Desa
    </h3> -->

        <?php if($kepala_desa){ ?>

        <div class="flex flex-col items-center text-center">

            <img src="<?= base_url('uploads/kepala_desa/'.$kepala_desa->foto); ?>"
                alt="<?= $kepala_desa->nama_kepala_desa; ?>" class="w-40 h-50 object-cover rounded-lg shadow-md border">

            <div class="mt-4">

                <p class="text-2xl font-bold">
                    <?= $kepala_desa->nama_kepala_desa; ?>
                </p>

                <p class="text-gray-500 text-lg">
                    Kepala Desa
                </p>

            </div>

        </div>

        <?php } else { ?>

        <div class="bg-yellow-100 text-yellow-700 p-4 rounded text-center">
            Data Kepala Desa belum tersedia.
        </div>

        <?php } ?>

    </div>
    <h4 class="text-xl font-semibold mb-2 mt-6">Perangkat Desa</h4>

    <div class="overflow-x-auto">

        <table class="min-w-full text-sm border border-gray-200">

            <thead>
                <tr class="bg-green-100">
                    <th class="py-2 px-4 text-center">Foto</th>
                    <th class="py-2 px-4 text-left">Jabatan</th>
                    <th class="py-2 px-4 text-left">Nama</th>
                </tr>
            </thead>

            <tbody>

                <?php if(!empty($perangkat_desa)) : ?>

                <?php foreach($perangkat_desa as $row) : ?>

                <tr>
                    <td class="py-2 px-4 text-center align-middle">
                        <img src="<?= base_url('uploads/perangkat_desa/'.$row->foto); ?>" alt="<?= $row->nama; ?>"
                            class="w-20 h-30 object-cover rounded-none border mx-auto">
                    </td>

                    <td class="py-2 px-4 text-left">
                        <?= $row->jabatan; ?>
                    </td>

                    <td class="py-2 px-4 text-left">
                        <?= $row->nama; ?>
                    </td>

                </tr>

                <?php endforeach; ?>

                <?php else : ?>

                <tr>
                    <td colspan="3" class="text-center py-4">
                        Data perangkat desa belum tersedia.
                    </td>
                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>
    </div>
    <?php foreach($lembaga_desa as $lembaga) : ?>

<div class="bg-white rounded-lg shadow p-6 mb-8">

    <h3 class="text-2xl font-semibold mb-4">
        <?= $lembaga->nama_lembaga; ?>
    </h3>

    <?php if(!empty($lembaga->anggota)) : ?>

    <ul class="list-disc list-inside space-y-1">

        <?php foreach($lembaga->anggota as $anggota) : ?>

        <li>
            <span class="font-medium">
                <?= $anggota->jabatan; ?> :
            </span>

            <?= $anggota->nama; ?>
        </li>

        <?php endforeach; ?>

    </ul>

    <?php else : ?>

        <p class="text-gray-500">
            Belum ada anggota.
        </p>

    <?php endif; ?>

</div>

<?php endforeach; ?>
</main>