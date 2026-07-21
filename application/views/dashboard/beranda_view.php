<!-- Hero Section -->
<?php
$gambarAwal = !empty($slides)
    ? base_url('uploads/hero/'.$slides[0]['gambar'])
    : base_url('assets/img/default.jpg');
?>
        <section id="beranda">
<section id="beranda" class="relative bg-green-700 text-white">
    <div class="block md:hidden">

        <!-- TAMBAHKAN id="hero-mobile" -->
            <img id="hero-mobile"
                src="<?= $gambarAwal; ?>"
                class="w-full h-48 object-cover opacity-60">
    </div>
    <div class="hidden md:block">
        <!-- TAMBAHKAN id="hero-desktop" -->
        <img id="hero-desktop"
            src="<?= $gambarAwal; ?>"
            class="w-full h-105 object-cover opacity-60">
    </div>
    <div
        class="relative md:absolute md:inset-0 flex flex-col items-center justify-center text-center px-4 py-8 md:py-0">
        <h2 class="text-2xl md:text-4xl font-bold mb-2">
            <?= $hero['judul']; ?>
        </h2>

        <p class="text-gray-200 mb-4 text-base">
            <?= $hero['deskripsi']; ?>
        </p>

        <p class="mb-4 text-base md:text-lg">
            <?= $hero['alamat']; ?>
        </p>
        <div class="flex flex-col gap-2 w-full max-w-xs mx-auto md:flex-row md:gap-3 md:max-w-none md:w-auto md:mx-0">
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
        <img src="<?= base_url('uploads/profil/'.$profil->gambar); ?>" alt="Peta Desa"
            class="rounded-lg shadow mb-6 md:mb-0 w-full md:w-110 h-48 object-cover">
        <div>
            <h3 class="text-2xl font-bold mb-2">Tentang Desa</h3>
            <p class="mb-2"><?= nl2br(word_limiter($profil->tentang, 43)); ?></p>
            <a href="<?php echo base_url('navbar/profil_desa'); ?>"
                class="text-green-700 font-semibold hover:underline">Lihat Selengkapnya</a>
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

            <!-- Lapor Warga Pendatang -->
            <a href="<?php echo base_url('navbar/layanan_publik'); ?>"
                class="flex flex-col items-center p-6 bg-gray-50 rounded-xl shadow-md hover:bg-green-50 hover:shadow-lg transition duration-300">
                <span class="text-5xl mb-4">👨‍👩‍👧‍👦</span>
                <h4 class="font-semibold text-lg mb-2">Lapor Warga Pendatang</h4>
                <p class="text-sm text-gray-500 text-center">
                    Lapor warga pendatang yang tinggal di desa untuk keperluan administrasi atau informasi.
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


        <!-- ================= BERITA ================= -->

        <?php if(!empty($berita)): ?>

        <?php foreach($berita as $row): ?>

        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">


            <img src="<?= base_url('uploads/berita/'.$row->gambar); ?>" alt="Berita Desa"
                class="w-full h-52 object-cover">


            <div class="p-5">

                <span class="text-xs text-green-600 font-semibold">
                    <?= date('d M Y', strtotime($row->tanggal)); ?>
                </span>


                <h4 class="text-lg font-bold mt-2 mb-2">
                    <?= $row->judul; ?>
                </h4>


                <p class="text-gray-600 text-sm">
                    <?= character_limiter(strip_tags($row->isi),100); ?>
                </p>


                <a href="<?= base_url('navbar/berita_pengumuman/berita_detail/'.$row->id_berita); ?>"
                    class="inline-block mt-4 text-green-700 font-semibold hover:underline">

                    Baca Selengkapnya →

                </a>


            </div>

        </div>


        <?php endforeach; ?>

        <?php endif; ?>



        <!-- ================= PENGUMUMAN ================= -->

        <?php if(!empty($pengumuman)): ?>

        <?php foreach($pengumuman as $row): ?>

        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">


            <img src="<?= base_url('uploads/pengumuman/'.$row->gambar); ?>" alt="Pengumuman Desa"
                class="w-full h-52 object-cover">


            <div class="p-5">


                <span class="text-xs text-green-600 font-semibold">
                    <?= date('d M Y', strtotime($row->tanggal)); ?>
                </span>


                <h4 class="text-lg font-bold mt-2 mb-2">
                    <?= $row->judul; ?>
                </h4>


                <p class="text-gray-600 text-sm">
                    <?= character_limiter(strip_tags($row->isi),100); ?>
                </p>


                <a href="<?= base_url('navbar/berita_pengumuman/pengumuman_detail/'.$row->id_pengumuman); ?>"
                    class="inline-block mt-4 text-green-700 font-semibold hover:underline">

                    Baca Selengkapnya →

                </a>


            </div>

        </div>


        <?php endforeach; ?>

        <?php endif; ?>


    </div>

    <div class="text-center mt-10">
        <a href="<?php echo base_url('navbar/berita_pengumuman'); ?>"
            class="inline-block bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
            Lihat Semua Berita
        </a>
    </div>
</section>

<!-- Galeri Foto / Video -->
<!-- Galeri Foto / Video -->
<section id="galeri" class="container mx-auto py-12 px-4">

    <h3 class="text-2xl font-bold mb-2 text-center">
        Galeri Desa
    </h3>

    <p class="text-gray-500 mb-8 text-center text-base">
        Dokumentasi foto dan video kegiatan serta keindahan desa.
    </p>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">


        <?php if(!empty($galeri)): ?>

        <?php foreach($galeri as $row): ?>


        <div class="aspect-[4/3] bg-gray-200 rounded shadow overflow-hidden">

            <img src="<?= base_url('uploads/galeri/'.$row->gambar); ?>" alt="<?= $row->judul; ?>"
                class="object-cover w-full h-full">

        </div>


        <?php endforeach; ?>


        <?php else: ?>


        <div class="col-span-4 text-center text-gray-500">
            Belum ada foto galeri.
        </div>


        <?php endif; ?>


    </div>


    <div class="text-center">

        <a href="<?= base_url('navbar/galeri'); ?>" class="text-green-700 font-semibold hover:underline">

            Lihat Galeri

        </a>

    </div>

</section>

<!-- Kontak & Lokasi -->
<section id="kontak" class="bg-white py-12">

    <div class="container mx-auto px-4 md:flex md:space-x-8">

        <div class="md:w-1/2 mb-8 md:mb-0">

            <h3 class="text-2xl font-bold mb-2">
                Kontak Desa
            </h3>


            <p class="text-gray-500 mb-4 text-base">
                Hubungi pemerintah desa untuk informasi,
                layanan administrasi, atau kebutuhan lainnya.
            </p>


            <p class="mb-2">
                📍
                <?= nl2br($kontak['alamat']); ?>
            </p>


            <p class="mb-2">
                🕒
                <?= $kontak['jam_pelayanan']; ?>
            </p>


            <p class="mb-2">
                ☎️
                <?= $kontak['telepon']; ?>
            </p>


            <p class="mb-2">
                ✉️
                <?= $kontak['email']; ?>
            </p>


            <p class="mb-2">
                💬
                <?= $kontak['whatsapp']; ?>
            </p>


        </div>


        <div class="md:w-1/2">

            <iframe src="<?= $kontak['maps']; ?>" width="100%" height="200" class="rounded shadow" style="border:0;"
                allowfullscreen="" loading="lazy">
            </iframe>


        </div>


    </div>

</section>