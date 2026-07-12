

<!-- Pemerintahan Desa -->
<main class="container mx-auto py-12 px-4 flex-1">
    <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Struktur Pemerintahan Desa Kelating</h2>
    <p class="text-gray-500 mb-6 text-base text-center">Informasi tentang perangkat desa, BPD, dan lembaga desa lainnya.
    </p>
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h3 class="text-2xl font-semibold mb-4">Kepala Desa</h3>
        <?php if($kepala_desa){ ?>
        <div class="flex items-center space-x-4 mb-4">
            <img src="<?= base_url('uploads/kepala_desa/'.$kepala_desa->foto); ?>"
                alt="<?= $kepala_desa->nama_kepala_desa; ?>" class="rounded-full h-24 w-24 object-cover">
            <div>
                <p class="font-bold text-lg">
                    <?= $kepala_desa->nama_kepala_desa; ?>
                </p>
                <p class="text-gray-500">Kepala Desa</p>
            </div>
        </div>
        <?php } else { ?>
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded">Data Kepala Desa belum tersedia.
        </div>
        <?php } ?>
        <h4 class="text-xl font-semibold mb-2 mt-6">Perangkat Desa</h4>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-green-100">
                        <th class="py-2 px-4 text-left font-semibold">Jabatan</th>
                        <th class="py-2 px-4 text-left font-semibold">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4">Sekretaris Desa</td>
                        <td class="py-2 px-4">[Nama Sekretaris]</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Kaur Keuangan</td>
                        <td class="py-2 px-4">[Nama Kaur Keuangan]</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Kaur Umum & Perencanaan</td>
                        <td class="py-2 px-4">[Nama Kaur Umum]</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Kasi Pemerintahan</td>
                        <td class="py-2 px-4">[Nama Kasi Pemerintahan]</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Kasi Kesejahteraan</td>
                        <td class="py-2 px-4">[Nama Kasi Kesejahteraan]</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Kasi Pelayanan</td>
                        <td class="py-2 px-4">[Nama Kasi Pelayanan]</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Kepala Dusun</td>
                        <td class="py-2 px-4">[Nama Kepala Dusun]</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h3 class="text-2xl font-semibold mb-4">Badan Permusyawaratan Desa (BPD)</h3>
        <ul class="list-disc list-inside space-y-1">
            <li><span class="font-medium">Ketua:</span> [Nama Ketua BPD]</li>
            <li><span class="font-medium">Wakil Ketua:</span> [Nama Wakil Ketua BPD]</li>
            <li><span class="font-medium">Sekretaris:</span> [Nama Sekretaris BPD]</li>
            <li><span class="font-medium">Anggota:</span> [Nama-nama Anggota BPD]</li>
        </ul>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-2xl font-semibold mb-4">Lembaga Desa Lainnya</h3>
        <ul class="list-disc list-inside space-y-1">
            <li>PKK (Pemberdayaan Kesejahteraan Keluarga)</li>
            <li>Karang Taruna</li>
            <li>LPMD (Lembaga Pemberdayaan Masyarakat Desa)</li>
            <li>Posyandu</li>
            <li>Kelompok Tani</li>
            <li>Dan lain-lain</li>
        </ul>
    </div>
</main>