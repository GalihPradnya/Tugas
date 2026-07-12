    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Berita & Pengumuman</h2>
        <p class="text-gray-500 mb-8 text-base text-center">Kumpulan berita dan pengumuman terbaru dari Desa Kelating.</p>
        <section class="mb-16">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h3 class="text-2xl font-semibold text-green-700">Berita Terbaru</h3>
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <input type="text" placeholder="Cari berita..." class="w-full pl-10 pr-4 py-2 border border-green-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400 bg-white shadow-sm transition" />
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/12/400/200" alt="Gambar Berita" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Berita 1</h4>
                    <span class="text-xs text-gray-400">01 Jan 2025</span>
                    <p class="mt-2 text-sm">Ringkasan berita terbaru di desa...</p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>Oleh: Admin</span>
                        <span>5 Komentar</span>
                    </div>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/13/400/200" alt="Gambar Berita" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Berita 2</h4>
                    <span class="text-xs text-gray-400">28 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan berita terbaru di desa...</p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>Oleh: Admin</span>
                        <span>2 Komentar</span>
                    </div>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/14/400/200" alt="Gambar Berita" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Berita 3</h4>
                    <span class="text-xs text-gray-400">20 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan berita terbaru di desa...</p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>Oleh: Admin</span>
                        <span>0 Komentar</span>
                    </div>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/15/400/200" alt="Gambar Berita" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Berita 4</h4>
                    <span class="text-xs text-gray-400">15 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan berita terbaru di desa...</p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>Oleh: Admin</span>
                        <span>3 Komentar</span>
                    </div>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/16/400/200" alt="Gambar Berita" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Berita 5</h4>
                    <span class="text-xs text-gray-400">10 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan berita terbaru di desa...</p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>Oleh: Admin</span>
                        <span>1 Komentar</span>
                    </div>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/berita_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/17/400/200" alt="Gambar Berita" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Berita 6</h4>
                    <span class="text-xs text-gray-400">05 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan berita terbaru di desa...</p>
                    <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                        <span>Oleh: Admin</span>
                        <span>4 Komentar</span>
                    </div>
                </a>
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
        </section>
        <section>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h3 class="text-2xl font-semibold text-green-700">Pengumuman</h3>
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <input type="text" placeholder="Cari pengumuman..." class="w-full pl-10 pr-4 py-2 border border-green-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400 bg-white shadow-sm transition" />
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <a href="<?php echo base_url('navbar/berita_pengumuman/pengumuman_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/18/400/200" alt="Gambar Pengumuman" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Pengumuman 1</h4>
                    <span class="text-xs text-gray-400">05 Jan 2025</span>
                    <p class="mt-2 text-sm">Ringkasan pengumuman penting untuk warga desa...</p>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/pengumuman_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/19/400/200" alt="Gambar Pengumuman" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Pengumuman 2</h4>
                    <span class="text-xs text-gray-400">30 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan pengumuman penting untuk warga desa...</p>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/pengumuman_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/24/400/200" alt="Gambar Pengumuman" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Pengumuman 3</h4>
                    <span class="text-xs text-gray-400">25 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan pengumuman penting untuk warga desa...</p>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/pengumuman_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/27/400/200" alt="Gambar Pengumuman" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Pengumuman 4</h4>
                    <span class="text-xs text-gray-400">20 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan pengumuman penting untuk warga desa...</p>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/pengumuman_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/28/400/200" alt="Gambar Pengumuman" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Pengumuman 5</h4>
                    <span class="text-xs text-gray-400">15 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan pengumuman penting untuk warga desa...</p>
                </a>
                <a href="<?php echo base_url('navbar/berita_pengumuman/pengumuman_detail'); ?>" class="block bg-white rounded shadow p-4 hover:bg-green-50">
                    <img src="https://picsum.photos/id/29/400/200" alt="Gambar Pengumuman" class="rounded mb-3 w-full h-40 object-cover">
                    <h4 class="font-semibold mb-1">Judul Pengumuman 6</h4>
                    <span class="text-xs text-gray-400">10 Des 2025</span>
                    <p class="mt-2 text-sm">Ringkasan pengumuman penting untuk warga desa...</p>
                </a>
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
        </section>
    </main>
   