
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
            <button id="menu-toggle" class="lg:hidden flex items-center px-3 py-2 border rounded text-green-700 border-green-700 focus:outline-none" aria-label="Toggle Menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <nav class="items-center hidden lg:flex gap-6">
                <a href="<?php echo base_url('beranda'); ?>" class="hover:text-green-600 font-medium">Beranda</a>
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium">Profil Desa</a>
                <a href="<?php echo base_url('navbar/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium">Layanan Publik</a>
                <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>" class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
                <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Galeri</a>
                <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
                <!-- Button Login -->
                <a href="<?php echo base_url('auth/login'); ?>" class="bg-green-600 text-white px-5 py-2 rounded-md font-semibold shadow hover:bg-green-700 transition duration-200">
                    Login
                </a>
            </nav>
        </div>
        <nav id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-white w-4/5 max-w-xs h-full shadow-lg p-6 flex flex-col gap-4 animate-slideInLeft">
                <button id="menu-close" class="self-end mb-4 text-gray-700" aria-label="Tutup Menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <a href="<?php echo base_url('beranda'); ?>" class="hover:text-green-600 font-medium">Beranda</a>
                <a href="<?php echo base_url('auth/profil'); ?>" class="hover:text-green-600 font-medium">Profil Desa</a>
                <a href="<?php echo base_url('auth/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('auth/layanan'); ?>" class="hover:text-green-600 font-medium">Layanan Publik</a>
                <a href="<?php echo base_url('auth/berita'); ?>" class="hover:text-green-600 font-medium">Berita & Pengumuman</a>
                <a href="<?php echo base_url('auth/galeri'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Galeri</a>
                <a href="<?php echo base_url('auth/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
            </div>
        </nav>
    </header>
    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Galeri Desa</h2>
        <p class="text-gray-500 mb-8 text-center text-base">Dokumentasi foto dan video kegiatan serta keindahan desa.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/159/400/300" alt="Galeri 1" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/108/400/300" alt="Galeri 2" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/109/400/300" alt="Galeri 3" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/110/400/300" alt="Galeri 4" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/112/400/300" alt="Galeri 5" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/114/400/300" alt="Galeri 6" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/120/400/300" alt="Galeri 7" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/124/400/300" alt="Galeri 8" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://picsum.photos/id/127/400/300" alt="Galeri 9" class="object-cover w-full h-full">
            </div>
        </div>
            <div class="flex justify-center mt-8">
                <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-l">&laquo;</a>
                    <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-green-700 text-white font-bold">1</a>
                    <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">2</a>
                    <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">3</a>
                    <a href="#" class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-r">&raquo;</a>
                </nav>
            </div>
    </main>
    
