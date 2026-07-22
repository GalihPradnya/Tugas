<?php

$CI =& get_instance();

$userLogin = null;

if($CI->session->userdata('id')){

    $userLogin = $CI->db
        ->select('
            user.email,
            user.image,
            penduduk.nama_lengkap
        ')
        ->from('user')
        ->join(
            'penduduk',
            'penduduk.id = user.penduduk_id'
        )
        ->where(
            'user.id',
            $CI->session->userdata('id')
        )
        ->get()
        ->row_array();

}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Kelating - Website Resmi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 text-gray-800 overflow-x-hidden">
    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-screen-2xl mx-auto flex items-center py-4 px-8">
        <div class="flex items-center space-x-3 min-w-0">
            <img src="<?= base_url('uploads/logo/' . $logoDesa['logo']); ?>"
                alt="<?= $logoDesa['nama_desa']; ?>"
                class="h-12 w-12 rounded-full">

            <h1 class="text-xl font-bold truncate">
                <?= $logoDesa['nama_desa']; ?>
            </h1>
        </div>
            <!-- Hamburger button for mobile/tablet -->
            <button id="menu-toggle"
            class="lg:hidden flex-shrink-0 items-center px-3 py-2 ml-4 border rounded text-green-700 border-green-700">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <!-- Desktop Navigation -->
            <?php
            $controller = $this->uri->segment(1);
            $active = $this->uri->segment(2);
            ?>
            <nav class="hidden lg:flex items-center gap-4 xl:gap-6 mx-auto">
                <a href="<?= base_url('beranda'); ?>"
                class="font-medium whitespace-nowrap <?= ($controller == 'beranda') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Beranda
                </a>
                             <?php
                        $active = $this->uri->segment(2);
                        ?>
                <a href="<?= base_url('navbar/profil_desa'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'profil_desa') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Profil Desa
                </a>
                <a href="<?= base_url('navbar/pemerintahan'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'pemerintahan') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Pemerintahan
                </a>
                <a href="<?= base_url('navbar/layanan_publik'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'layanan_publik') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Layanan Publik
                </a>
                <a href="<?= base_url('navbar/berita_pengumuman'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'berita_pengumuman') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Berita & Pengumuman
                </a>
                <a href="<?= base_url('navbar/galeri'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'galeri') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Galeri
                </a>
                <a href="<?= base_url('navbar/kontak'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'kontak') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Kontak
                </a>
            </nav>
                            <!-- Button Login -->
                <?php if($this->session->userdata('id')): ?>

                <div class="relative">

                <button
                    id="profileBtn"
                    class="flex items-center gap-3 bg-white border border-gray-200 rounded-full px-3 py-2 shadow-sm hover:shadow-md transition-all duration-200">

                    <img
                        src="<?= base_url('assets/img/profile/'.$this->session->userdata('image')); ?>"
                        class="w-10 h-10 rounded-full object-cover border-2 border-green-500">

                    <div class="hidden xl:block text-left">
                        <p class="text-sm font-semibold text-gray-800 leading-none">
                            <?= $userLogin['nama_lengkap']; ?>
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            <?php
                            if($this->session->userdata('role_id') == 1){
                                echo 'Super Admin';
                            } elseif($this->session->userdata('role_id') == 2){
                                echo 'Admin';
                            } else {
                                echo 'Masyarakat';
                            }
                            ?>
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 text-gray-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7" />

                    </svg>

                </button>

                <!-- Dropdown -->
                <div
                    id="profileDropdown"
                    class="hidden absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50">

                    <!-- Header -->
                    <div class="bg-green-600 text-white px-3 py-3">

                        <p class="font-semibold">
                            <?= $userLogin['nama_lengkap']; ?>
                        </p>

                        <p class="card-text">
                            <?= !empty($userLogin['email']) ? $userLogin['email'] : '-'; ?>
                        </p>

                    </div>

                    <!-- Dashboard -->
                    <?php if($this->session->userdata('role_id') == 3): ?>

                        <a href="<?= base_url('user/user'); ?>"
                        class="block px-4 py-3 hover:bg-gray-100">
                            🏠 Profil Saya
                        </a>

                    <?php elseif($this->session->userdata('role_id') == 2): ?>

                        <a href="<?= base_url('admin'); ?>"
                        class="block px-4 py-3 hover:bg-gray-100">
                            🏠 Dashboard
                        </a>

                    <?php else: ?>

                        <a href="<?= base_url('superadmin'); ?>"
                        class="block px-4 py-3 hover:bg-gray-100">
                            🏠 Dashboard
                        </a>

                    <?php endif; ?>

                    <!-- Surat Saya -->
                    <a href="<?= base_url('user/surat_saya'); ?>"
                    class="block px-4 py-3 hover:bg-gray-100">
                        📄 Surat Saya
                    </a>

                    <!-- Website Desa -->
                    <a href="<?= base_url('beranda'); ?>"
                    class="block px-4 py-3 hover:bg-gray-100">
                        🌐 Website Desa
                    </a>

                    <hr>

                    <!-- Logout -->
                    <a href="#"
                    onclick="logoutConfirm()"
                    class="block px-3 py-2 text-sm text-red-600 hover:bg-red-50">
                        🚪 Logout
                    </a>

                </div>

            </div>

            <?php else: ?>

                <a href="<?= base_url('auth/login'); ?>"
                class="bg-green-600 text-white px-5 py-2 rounded-md">

                    Login

                </a>

            <?php endif; ?>
        </div>
        <!-- Mobile/Tablet Navigation -->
        <nav id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-white w-4/5 max-w-xs h-full shadow-lg p-6 flex flex-col gap-4 animate-slideInLeft">
                <button id="menu-close" class="self-end mb-4 text-gray-700" aria-label="Tutup Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>

                </button>
                <?php if($this->session->userdata('id')): ?>

                <div class="border-b pb-4 mb-4">

                    <button
                        id="mobileProfileBtn"
                        class="w-full flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <img
                                src="<?= base_url('assets/img/profile/'.$this->session->userdata('image')); ?>"
                                class="w-12 h-12 rounded-full object-cover border-2 border-green-500">

                            <div class="text-left">
                                <h3 class="font-semibold">
                                  <?= $userLogin['nama_lengkap']; ?>
                                </h3>

                                <p class="card-text">
                                    <?= !empty($userLogin['email']) ? $userLogin['email'] : '-'; ?>
                                </p>
                            </div>

                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div id="mobileProfileDropdown" class="hidden mt-3 pl-3 flex flex-col gap-2">

                        <?php if($this->session->userdata('role_id') == 3): ?>

                            <a href="<?= base_url('user'); ?>">
                                🏠 Profil Saya
                            </a>

                        <?php elseif($this->session->userdata('role_id') == 2): ?>

                            <a href="<?= base_url('admin'); ?>">
                                🏠 Dashboard
                            </a>

                        <?php else: ?>

                            <a href="<?= base_url('superadmin'); ?>">
                                🏠 Dashboard
                            </a>

                        <?php endif; ?>

                        <a href="<?= base_url('surat_saya'); ?>">
                            📄 Surat Saya
                        </a>

                        <a href="#"
                            onclick="logoutConfirm()"
                            class="text-red-600">
                            🚪 Logout
                        </a>

                    </div>

                </div>

                <?php endif; ?>
                <?php
            $controller = $this->uri->segment(1);
            $active = $this->uri->segment(2);
            ?>
           
                <a href="<?= base_url('beranda'); ?>"
                class="font-medium whitespace-nowrap <?= ($controller == 'beranda') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Beranda
                </a>
                             <?php
                        $active = $this->uri->segment(2);
                        ?>
                <a href="<?= base_url('navbar/profil_desa'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'profil_desa') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Profil Desa
                </a>
                <a href="<?= base_url('navbar/pemerintahan'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'pemerintahan') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Pemerintahan
                </a>
                <a href="<?= base_url('navbar/layanan_publik'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'layanan_publik') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Layanan Publik
                </a>
                <a href="<?= base_url('navbar/berita_pengumuman'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'berita_pengumuman') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Berita & Pengumuman
                </a>
                <a href="<?= base_url('navbar/galeri'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'galeri') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Galeri
                </a>
                <a href="<?= base_url('navbar/kontak'); ?>"
                class="font-medium whitespace-nowrap <?= ($active == 'kontak') ? 'text-green-700 font-bold' : 'hover:text-green-600' ?>">
                Kontak
                </a>

            </div>
        </nav>
    </header>