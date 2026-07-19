    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Berita & Pengumuman</h2>
        <p class="text-gray-500 mb-8 text-base text-center">Kumpulan berita dan pengumuman terbaru dari Desa Kelating.
        </p>
        <section class="mb-16">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h3 class="text-2xl font-semibold text-green-700">Berita Terbaru</h3>
                <div class="w-full md:w-1/3">
                    <div class="relative">

                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php if(!empty($berita)): ?>
                <?php foreach($berita as $row): ?>
                <a href="<?= base_url('navbar/berita_pengumuman/berita_detail/'.$row->id_berita); ?>"
                    class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="<?= base_url('uploads/berita/'.$row->gambar); ?>"
                        class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">
                        <?= $row->judul; ?>
                    </h4>
                    <span class="text-xs text-gray-400">
                        <?= date('d M Y',strtotime($row->tanggal)); ?>
                    </span>
                    <p class="mt-2 text-sm">
                        <?= character_limiter(strip_tags($row->isi),100); ?>
                    </p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>
                            Oleh : <?= $row->penulis; ?>
                        </span>
                        <span>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="col-span-3 text-center text-gray-500">
                    Belum ada berita.
                </div>
                <?php endif; ?>
            </div>
            <div class="flex justify-center mt-8">
                <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#"
                        class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-l">&laquo;</a>
                    <a href="#"
                        class="px-3 py-1 border-t border-b border-gray-300 bg-green-700 text-white font-bold">1</a>
                    <a href="#"
                        class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">2</a>
                    <a href="#"
                        class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">3</a>
                    <a href="#"
                        class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-r">&raquo;</a>
                </nav>
            </div>
        </section>
        <section>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h3 class="text-2xl font-semibold text-green-700">Pengumuman</h3>
                <div class="w-full md:w-1/3">
                    <div class="relative">

                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php if(!empty($pengumuman)): ?>
                <?php foreach($pengumuman as $row): ?>
                <a href="<?= base_url('navbar/berita_pengumuman/pengumuman_detail/'.$row->id_pengumuman); ?>"
                    class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="<?= base_url('uploads/pengumuman/'.$row->gambar); ?>"
                        class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">
                        <?= $row->judul; ?>
                    </h4>
                    <span class="text-xs text-gray-400">
                        <?= date('d M Y',strtotime($row->tanggal)); ?>
                    </span>
                    <p class="mt-2 text-sm">
                        <?= character_limiter(strip_tags($row->isi),90); ?>
                    </p>
                </a>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="col-span-3 text-center">
                    Belum ada pengumuman.
                </div>
                <?php endif; ?>
            </div>
            <div class="flex justify-center mt-8">
                <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#"
                        class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-l">&laquo;</a>
                    <a href="#"
                        class="px-3 py-1 border-t border-b border-gray-300 bg-green-700 text-white font-bold">1</a>
                    <a href="#"
                        class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">2</a>
                    <a href="#"
                        class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">3</a>
                    <a href="#"
                        class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-r">&raquo;</a>
                </nav>
            </div>
        </section>
    </main>