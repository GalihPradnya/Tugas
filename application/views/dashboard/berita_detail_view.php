
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
                <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Berita & Pengumuman</a>
                <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
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
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="hover:text-green-600 font-medium">Profil Desa</a>
                <a href="<?php echo base_url('navbar/pemerintahan'); ?>" class="hover:text-green-600 font-medium">Pemerintahan</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>" class="hover:text-green-600 font-medium">Layanan Publik</a>
                <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>" class="hover:text-green-600 font-medium text-green-700 font-bold">Berita & Pengumuman</a>
                <a href="<?php echo base_url('navbar/galeri'); ?>" class="hover:text-green-600 font-medium">Galeri</a>
                <a href="<?php echo base_url('navbar/kontak'); ?>" class="hover:text-green-600 font-medium">Kontak</a>
            </div>
        </nav>
    </header>
    <main class="container mx-auto py-12 px-4 flex-1">
        <nav class="mb-6 text-sm">
            <a href="index.html" class="text-green-700 hover:underline">Beranda</a> &gt; <a href="berita-pengumuman.html" class="text-green-700 hover:underline">Berita & Pengumuman</a> &gt; <span class="text-gray-500">Detail Berita</span>
        </nav>
        <article class="bg-white rounded-xl shadow-lg p-6 md:p-10 mx-auto mb-10">
            <h2 class="text-3xl font-bold mb-2 text-green-700">Judul Berita 1</h2>
            <div class="flex items-center gap-4 mb-4 text-sm text-gray-500">
                <span class="inline-flex items-center gap-1"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg> Oleh: <span class="font-semibold text-green-700">Admin</span></span>
                <span class="inline-flex items-center gap-1"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m-4-5v9"/></svg> 01 Jan 2025</span>
            </div>
            <img src="https://picsum.photos/id/89/600/300" alt="Gambar Berita" class="rounded-lg my-6 w-full max-w-2xl mx-auto shadow">
            <div class="prose max-w-none mb-6">
                <p>Isi lengkap berita desa yang informatif, aktual, dan bermanfaat bagi masyarakat. Paragraf ini dapat berisi penjelasan detail mengenai peristiwa, kegiatan, atau informasi penting yang terjadi di desa.</p>
                <p>Paragraf tambahan untuk memperkaya konten berita dan memberikan gambaran yang lebih jelas kepada pembaca.</p>
            </div>
        </article>
        <section class="mx-auto bg-white rounded-xl shadow p-6 md:p-8">
            <h3 class="text-xl font-bold mb-4 text-green-700">Komentar</h3>
            <form class="mb-8">
                <div class="mb-3">
                    <label for="nama" class="block mb-1 font-medium">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Nama Anda">
                </div>
                <div class="mb-3">
                    <label for="komentar" class="block mb-1 font-medium">Komentar</label>
                    <textarea id="komentar" name="komentar" rows="3" class="w-full px-3 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Tulis komentar..."></textarea>
                </div>
                <button type="submit" class="bg-green-700 text-white px-5 py-2 rounded font-semibold shadow hover:bg-green-800 transition">Kirim Komentar</button>
            </form>
            <div class="space-y-6">
                <div class="border-b pb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="font-semibold text-green-700">Budi</span>
                        <span class="text-xs text-gray-400">2 hari lalu</span>
                    </div>
                    <p class="text-gray-700">Terima kasih atas informasinya, sangat membantu!</p>
                </div>
                <div class="border-b pb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="font-semibold text-green-700">Siti</span>
                        <span class="text-xs text-gray-400">1 hari lalu</span>
                    </div>
                    <p class="text-gray-700">Semoga desa kita semakin maju!</p>
                </div>
            </div>
        </section>
    </main>
