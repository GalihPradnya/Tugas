<main class="container mx-auto py-12 px-4 flex-1">
    <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Galeri Desa</h2>
    <p class="text-gray-500 mb-8 text-center text-base">Dokumentasi foto dan video kegiatan serta keindahan desa.</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">

    <?php if (!empty($galeri)) : ?>

        <?php foreach ($galeri as $row) : ?>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <img
                    src="<?= base_url('uploads/galeri/' . $row->gambar); ?>"
                    alt="<?= $row->judul; ?>"
                    class="w-full h-64 object-cover">

                <div class="p-4">

                    <h4 class="font-bold text-green-700 text-lg">
                        <?= $row->judul; ?>
                    </h4>

                    <?php if (!empty($row->deskripsi)) : ?>

                        <p class="text-sm text-gray-600 mt-2">
                            <?= character_limiter(strip_tags($row->deskripsi), 80); ?>
                        </p>

                    <?php endif; ?>

                    <p class="text-xs text-gray-400 mt-3">
                        <?= date('d F Y', strtotime($row->tanggal)); ?>
                    </p>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else : ?>

        <div class="col-span-3 text-center py-10">

            <img src="<?= base_url('assets/img/no-image.png'); ?>"
                 class="mx-auto w-32 mb-3">

            <h5 class="text-lg font-semibold text-gray-500">
                Belum ada galeri.
            </h5>

        </div>

    <?php endif; ?>

</div>
    <!-- <div class="flex justify-center mt-8">
        <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
            <a href="#"
                class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-l">&laquo;</a>
            <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-green-700 text-white font-bold">1</a>
            <a href="#"
                class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">2</a>
            <a href="#"
                class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-700 hover:bg-green-100">3</a>
            <a href="#"
                class="px-3 py-1 border border-gray-300 bg-white text-gray-700 hover:bg-green-100 rounded-r">&raquo;</a>
        </nav>
    </div> -->
</main>