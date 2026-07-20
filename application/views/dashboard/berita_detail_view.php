
    <main class="container mx-auto py-12 px-4 flex-1">
        <nav class="mb-6 text-sm">
            <a href="index.html" class="text-green-700 hover:underline">Beranda</a> &gt; <a href="berita-pengumuman.html" class="text-green-700 hover:underline">Berita & Pengumuman</a> &gt; <span class="text-gray-500"><?= $berita->judul; ?></span>
        </nav>
        <article class="bg-white rounded-xl shadow-lg p-6 md:p-10 mx-auto mb-10">
            <h2 class="text-3xl font-bold mb-2 text-green-700"><?= $berita->judul; ?></h2>
            <div class="flex items-center gap-4 mb-4 text-sm text-gray-500">
                <span class="inline-flex items-center gap-1"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg> Oleh: <span class="font-semibold text-green-700"><?= $berita->penulis; ?></span></span>
                <span class="inline-flex items-center gap-1"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m-4-5v9"/></svg><?= date('d F Y', strtotime($berita->tanggal)); ?></span>
            </div>
            <img src="<?= base_url('uploads/berita/'.$berita->gambar); ?>" class="rounded-lg my-6 w-full max-w-2xl mx-auto shadow">
            <div class="prose max-w-none mb-6">
                <?= $berita->isi; ?>
            </div>
        </article>
        <!-- <section class="mx-auto bg-white rounded-xl shadow p-6 md:p-8">
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
        </section> -->
    </main>
