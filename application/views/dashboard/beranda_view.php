
    <!-- Hero Section -->
    <section id="beranda" class="relative bg-green-700 text-white">
        <div class="block md:hidden">
            <!-- TAMBAHKAN id="hero-mobile" -->
            <img id="hero-mobile" src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=1200&q=80"
                alt="Foto Desa" class="w-full h-48 object-cover opacity-60">
        </div>
        <div class="hidden md:block">
            <!-- TAMBAHKAN id="hero-desktop" -->
            <img id="hero-desktop" src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=1200&q=80"
                alt="Foto Desa" class="w-full h-105 object-cover opacity-60">
        </div>
        <div
            class="relative md:absolute md:inset-0 flex flex-col items-center justify-center text-center px-4 py-8 md:py-0">
            <h2 class="text-2xl md:text-4xl font-bold mb-2">Selamat datang di Website Resmi Desa Kelating</h2>
            <p class="text-gray-200 mb-4 text-base">Informasi, layanan, dan berita terkini seputar Desa Kelating.</p>
            <p class="mb-4 text-base md:text-lg">Kec. Kerambitan, Kab. Tabanan, Provinsi Bali. Bersama membangun desa yang mandiri dan
                sejahtera.</p>
            <div
                class="flex flex-col gap-2 w-full max-w-xs mx-auto md:flex-row md:gap-3 md:max-w-none md:w-auto md:mx-0">
                <a href="<?php echo base_url('navbar/profil_desa'); ?>"
                    class="bg-white text-green-700 px-5 py-2 rounded font-semibold shadow hover:bg-green-100">Lihat
                    Profil Desa</a>
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>"
                    class="bg-green-500 text-white px-5 py-2 rounded font-semibold shadow hover:bg-green-600">Ajukan
                    Surat Online</a>
            </div>
        </div>
    </section>

    <!-- Tentang Desa -->
    <section id="profil" class="container mx-auto py-4 px-4">
        <div class="md:flex md:items-center md:gap-8">
            <img src="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?auto=format&fit=crop&w=300&q=80"
                alt="Peta Desa" class="rounded-lg shadow mb-6 md:mb-0 w-full md:w-auto">
            <div>
                <h3 class="text-2xl font-bold mb-2">Tentang Desa</h3>
                <p class="mb-2">Desa Kelating terletak di Kecamatan Kerambitan, Kabupaten Tabanan. Memiliki jumlah penduduk
                    sekitar 5.679 jiwa. Potensi ekonomi desa meliputi pertanian, UMKM, dan pariwisata budaya yang
                    berkembang.</p>
                <a href="<?php echo base_url('navbar/profil_desa'); ?>" class="text-green-700 font-semibold hover:underline">Lihat Selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- Layanan Unggulan -->
    <section id="layanan" class="bg-white py-12">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center mb-2">Layanan Unggulan</h3>
            <p class="text-gray-500 mb-8 text-center text-base">
                Nikmati kemudahan layanan publik dan informasi unggulan dari Desa Kelating.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">

                <!-- Pengajuan Surat -->
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>"
                    class="flex flex-col items-center p-6 bg-gray-50 rounded-xl shadow-md hover:bg-green-50 hover:shadow-lg transition duration-300">
                    <span class="text-5xl mb-4">📝</span>
                    <h4 class="font-semibold text-lg mb-2">Pengajuan Surat</h4>
                    <p class="text-sm text-gray-500 text-center">
                        Ajukan berbagai jenis surat secara online dengan mudah dan cepat.
                    </p>
                </a>

                <!-- Data Penduduk -->
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>"
                    class="flex flex-col items-center p-6 bg-gray-50 rounded-xl shadow-md hover:bg-green-50 hover:shadow-lg transition duration-300">
                    <span class="text-5xl mb-4">👨‍👩‍👧‍👦</span>
                    <h4 class="font-semibold text-lg mb-2">Data Penduduk</h4>
                    <p class="text-sm text-gray-500 text-center">
                        Lihat informasi dan statistik kependudukan Desa Kelating.
                    </p>
                </a>

                <!-- Pengaduan Masyarakat -->
                <a href="<?php echo base_url('navbar/layanan_publik'); ?>"
                    class="flex flex-col items-center p-6 bg-gray-50 rounded-xl shadow-md hover:bg-green-50 hover:shadow-lg transition duration-300">
                    <span class="text-5xl mb-4">📢</span>
                    <h4 class="font-semibold text-lg mb-2">Pengaduan Masyarakat</h4>
                    <p class="text-sm text-gray-500 text-center">
                        Sampaikan kritik, saran, maupun pengaduan kepada pemerintah desa.
                    </p>
                </a>

            </div>
        </div>
    </section>

    <!-- Berita & Pengumuman Terbaru -->
    <section id="berita" class="container mx-auto py-12 px-4">
        <h3 class="text-2xl font-bold mb-2 text-center">Berita & Pengumuman Terbaru</h3>
        <p class="text-gray-500 mb-8 text-center text-base">
            Update berita, pengumuman, dan informasi penting untuk warga desa.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Berita 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=48&q=80"
                    alt="Berita Desa"
                    class="w-full h-52 object-cover">

                <div class="p-5">
                    <span class="text-xs text-green-600 font-semibold">01 Januari 2026</span>

                    <h4 class="text-lg font-bold mt-2 mb-2">
                        Musyawarah Desa Tahun 2026
                    </h4>

                    <p class="text-gray-600 text-sm">
                        Pemerintah Desa Kelating mengadakan musyawarah desa untuk
                        membahas program pembangunan dan pemberdayaan masyarakat.
                    </p>

                    <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>"
                        class="inline-block mt-4 text-green-700 font-semibold hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Berita 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=48&q=80"
                    alt="Pengumuman Desa"
                    class="w-full h-52 object-cover">

                <div class="p-5">
                    <span class="text-xs text-green-600 font-semibold">28 Desember 2025</span>

                    <h4 class="text-lg font-bold mt-2 mb-2">
                        Jadwal Gotong Royong Bersama
                    </h4>

                    <p class="text-gray-600 text-sm">
                        Seluruh warga diharapkan mengikuti kegiatan gotong royong
                        membersihkan lingkungan desa pada akhir pekan ini.
                    </p>

                    <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>"
                        class="inline-block mt-4 text-green-700 font-semibold hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Berita 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=48&q=80"
                    alt="Informasi Desa"
                    class="w-full h-52 object-cover">

                <div class="p-5">
                    <span class="text-xs text-green-600 font-semibold">15 Desember 2025</span>

                    <h4 class="text-lg font-bold mt-2 mb-2">
                        Pengembangan Wisata Desa Kelating
                    </h4>

                    <p class="text-gray-600 text-sm">
                        Pemerintah desa mulai mengembangkan potensi wisata alam dan
                        budaya sebagai daya tarik wisatawan.
                    </p>

                    <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>"
                        class="inline-block mt-4 text-green-700 font-semibold hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

        </div>

        <div class="text-center mt-10">
            <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>"
                class="inline-block bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
                Lihat Semua Berita
            </a>
        </div>
    </section>

    <!-- Potensi Desa / Highlight -->
    <!-- <section class="bg-green-50 py-12">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center mb-2">Potensi Desa</h3>
            <p class="text-gray-500 mb-8 text-center text-base">Berbagai potensi ekonomi, wisata, dan budaya yang
                dimiliki Desa Kelating.</p>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                    <span class="text-3xl mb-2">🌾</span>
                    <h4 class="font-semibold mb-1">UMKM & Produk Unggulan</h4>
                    <p class="text-sm text-center">Produk lokal berkualitas dari warga desa.</p>
                    <a href="" class="text-green-700 font-semibold hover:underline mt-2">Detail</a>
                </div>
                <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                    <span class="text-3xl mb-2">🏞️</span>
                    <h4 class="font-semibold mb-1">Wisata Alam / Budaya</h4>
                    <p class="text-sm text-center">Keindahan alam dan tradisi budaya desa.</p>
                    <a href="" class="text-green-700 font-semibold hover:underline mt-2">Detail</a>
                </div>
                <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                    <span class="text-3xl mb-2">🎉</span>
                    <h4 class="font-semibold mb-1">Kegiatan Masyarakat</h4>
                    <p class="text-sm text-center">Berbagai kegiatan sosial dan budaya warga.</p>
                    <a href="" class="text-green-700 font-semibold hover:underline mt-2">Detail</a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Galeri Foto / Video -->
    <section id="galeri" class="container mx-auto py-12 px-4">
        <h3 class="text-2xl font-bold mb-2 text-center">Galeri Desa</h3>
        <p class="text-gray-500 mb-8 text-center text-base">Dokumentasi foto dan video kegiatan serta keindahan desa.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=400&q=80"
                    alt="Galeri 1" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1531662439848-a7ed93c51468?auto=format&fit=crop&w=400&q=80"
                    alt="Galeri 2" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1440558929809-1412944a6225?auto=format&fit=crop&w=400&q=80"
                    alt="Galeri 3" class="object-cover w-full h-full">
            </div>
            <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">
                <img src="https://images.unsplash.com/photo-1520052203542-d3095f1b6cf0?auto=format&fit=crop&w=400&q=80"
                    alt="Galeri 4" class="object-cover w-full h-full">
            </div>
        </div>
        <div class="text-center">
            <a href="<?php echo base_url('navbar/galeri'); ?>" class="text-green-700 font-semibold hover:underline">Lihat Galeri</a>
        </div>
    </section>

    <!-- Kontak & Lokasi -->
    <section id="kontak" class="bg-white py-12">
        <div class="container mx-auto px-4 md:flex md:space-x-8">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h3 class="text-2xl font-bold mb-2">Kontak Desa</h3>
                <p class="text-gray-500 mb-4 text-base">Hubungi kami untuk informasi, layanan, atau keperluan
                    administrasi desa.</p>
                <p class="mb-1">Alamat: Jl. Raya Desa Kelating No. 1, Kecamatan Kerambitan, Kabupaten Tabanan</p>
                <p class="mb-1">Telepon: 08xx-xxxx-xxxx</p>
                <p class="mb-1">Email: desakelating@email.com</p>
            </div>
            <div class="md:w-1/2">
                <iframe src="https://maps.google.com/maps?q=-7.250445,112.768845&z=15&output=embed" width="100%"
                    height="200" class="rounded shadow" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    