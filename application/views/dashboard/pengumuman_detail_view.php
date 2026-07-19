    <main class="container mx-auto py-12 px-4 flex-1">
        <nav class="mb-6 text-sm">
            <a href="index.html" class="text-green-700 hover:underline">Beranda</a> &gt; <a
                href="berita-pengumuman.html" class="text-green-700 hover:underline">Berita & Pengumuman</a> &gt; <span
                class="text-gray-500">Detail Pengumuman</span>
        </nav>
        <article class="bg-white rounded shadow p-6">
            <h2 class="text-2xl font-bold mb-2"><?= $pengumuman->judul; ?></h2>
            <span class="text-xs text-gray-400"><?= date('d F Y',strtotime($pengumuman->tanggal)); ?></span>
            <img src="<?= base_url('uploads/pengumuman/'.$pengumuman->gambar); ?>"
                class="rounded my-4 w-full max-w-2xl mx-auto">
            <p class="mb-4"><?= $pengumuman->isi; ?></p>
            <?php if(!empty($pengumuman->lampiran)): ?>
            <div class="mt-6">
                <a href="<?= base_url('uploads/pengumuman/'.$pengumuman->lampiran); ?>"
                    class="bg-green-700 text-white px-4 py-2 rounded">
                    Download Lampiran
                </a>
            </div>
            <?php endif; ?>
        </article>
    </main>